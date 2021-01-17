<?php

class Server
{
    private const READ_BUFFER_LENGTH = 1024;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * @var string
     */
    private $path;

    /**
     * @var resource
     */
    private $server;

    /**
     * RPCServer constructor.
     *
     * @param string $host
     * @param string $port
     * @param string $path
     */
    public function __construct(string $host, string $port, string $path)
    {
        $this->host = $host;
        $this->port = $port;
        $this->path = realpath($path);
    }

    /**
     * Starts socket server
     */
    public function start(): void
    {
        // Create a Socket service
        // AF_INET IPv4 network protocol
        // Sock "stream provides a sequential, reliable, full duplex, connection based byte stream. Support data transmission flow control mechanism.
        // The TCP protocol is based on this streaming socket.
        // Sol? TCP and UDP correspond to sol? TCP and sol? UDP
        if (($this->server = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) {
            $this->response(
                sprintf('socket_create() Execution failure: %s', socket_strerror(socket_last_error()))
            );
        }

        // Set port reuse
        if (!socket_set_option($this->server, SOL_SOCKET, SO_REUSEADDR, 1)) {
            $this->response(
                sprintf('socket_set_option() Execution failure: %s', socket_strerror(socket_last_error()))
            );
        }

        // Binding port
        if (socket_bind($this->server, $this->host, $this->port) < 0) {
            $this->response(
                sprintf('socket_bind() Execution failure: %s', socket_strerror(socket_last_error()))
            );
        }

        // Monitor port
        if ((socket_listen($this->server, 3)) < 0) {
            $this->response(
                sprintf('socket_listen() Execution failure: %s', socket_strerror(socket_last_error()))
            );
        }

        echo "RPC server started on {$this->host}:{$this->port}\n";
        $this->wait();
    }

    /**
     * @throws ReflectionException
     */
    private function wait(): void
    {
        while (true) {
            $client = socket_accept($this->server);
            if (!$client) {
                continue;
            }

            // One time read
            $buffer = socket_read($client, self::READ_BUFFER_LENGTH);

            echo sprintf("Data received within the length of client %s:\n%s\n", self::READ_BUFFER_LENGTH, $buffer);
            $parsed = $this->parseBuffer($buffer);
            if (!$parsed) {
                socket_write($client, 'Invalid request');
            }

            $class = $parsed['class'];
            $method = $parsed['method'];
            $params = $parsed['params'];

            if (!empty($params)) {
                $params = json_decode($params, true);
                if (is_array($params)) {
                    $params = implode(',', $params);
                }
            }

            // Class file needs to be consistent with class name
            $file = sprintf('%s/services/%s.php', $this->path, $class);

            // Execution result as return value
            $data = '';

            // Judge whether the class file exists
            if (file_exists($file)) {
                include_once $file;

                // Instantiation class is used to export or extract detailed information about classes, methods, properties, parameters, etc., including comments.
                $refObj = new ReflectionClass($class);
                // Determine whether the specified method exists in the object
                if (!$refObj->hasMethod($method)) {
                    socket_write($client, 'Method does not exist');
                }

                // Execute the object method
                $refMethod = $refObj->getMethod($method);
                if (!empty($params)) {
                    //Passing parameters to a method
                    $data = $refMethod->invokeArgs($refObj->newInstance(), [$params]);
                }

                //Return the result after running to the client
                socket_write($client, $data);
            }

            // Close client
            socket_close($client);
        }
    }

    /**
     * Returns parsed buffer data
     *
     * @param $buffer
     *
     * @return array|bool
     */
    private function parseBuffer($buffer)
    {
        // Regular judgment of data submitted by client
        $classData = preg_match('/Rpc-Class:\s(.*);\n/i', $buffer, $class);
        $methodData = preg_match('/Rpc-Method:\s(.*);\n/i', $buffer, $method);
        $paramsRet = preg_match('/Rpc-Params:\s(.*);\n/i', $buffer, $params);

        if (!$classData || !$methodData) {
            return false;
        }

        return [
            'class' => ucfirst($class[1]),
            'method' => $method[1],
            'params' => $params[1]
        ];
    }

    /**
     * Return data function.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    private function response($data)
    {
        if (is_array($data)) {
            $data = json_encode($data);
        }

        return $data.PHP_EOL;
    }
}

$server = new Server('127.0.0.1', '8081', '');
$server->start();