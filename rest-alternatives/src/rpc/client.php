<?php

class Client
{
    /**
     * Remote call URL component
     *
     * @var mixed
     */
    private $urlInfo = [];

    /**
     * RPCClient constructor.
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->urlInfo = parse_url($url);
    }

    /**
     * Return data function.
     *
     * @param [type] $data
     *
     * @return mixed
     */
    public function response($data)
    {
        if (is_array($data)) {
            $data = json_encode($data);
        }
        echo $data.PHP_EOL;

        return;
    }

    /**
     * Remote function call
     *
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        $socketHandler = fsockopen($this->urlInfo['host'], $this->urlInfo['port']);

        // Class name of the pass through call
        $class = basename($this->urlInfo['path']);

        // Pass the parameters of the call
        $args = '';
        if (isset($arguments[0])) {
            $args = json_encode($arguments[0]);
        }

        // Send our customized protocol data to the server
        $data = sprintf("Rpc-Class: {$class};\nRpc-Method: {$name};\nRpc-Params: {$args};\n");
        fputs($socketHandler, $data);

        $start_time = time();
        $responseData = '';

        while (!feof($socketHandler)) {
            $responseData .= fread($socketHandler, 1024);

            $diff = time() - $start_time;
            if ($diff > 24) {
                die('Timeout!n');
            }

            $status = stream_get_meta_data($socketHandler);
            if ($status['timed_out']) {
                $this->response('Stream Timeout!n');
            }
        }

        fclose($socketHandler);
        return $responseData;
    }
}

$rpcClient = new Client('http://127.0.0.1:8081/foo');
echo $rpcClient->demo1(['title' => 'Request title', 'content' => 'Request content']);
echo $rpcClient->demo2(['title' => 'Request title', 'content' => 'Request content']);