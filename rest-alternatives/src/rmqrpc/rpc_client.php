<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once '../../vendor/autoload.php';

class FibonacciRpcClient
{
    /**
     * @var AMQPStreamConnection
     */
    private $connection;

    /**
     * @var \PhpAmqpLib\Channel\AMQPChannel
     */
    private $channel;

    /**
     * @var string
     */
    private $callbackQueue;

    /**
     * @var mixed
     */
    private $response;

    /**
     * @var string
     */
    private $correlationId;

    /**
     * FibonacciRpcClient constructor.
     *
     * @param string $host
     * @param string $port
     * @param string $user
     * @param string $password
     */
    public function __construct(string $host, int $port, string $user, string $password)
    {
        $this->connection = new AMQPStreamConnection(
            $host,
            $port,
            $user,
            $password
        );

        $this->channel = $this->connection->channel();
        list($this->callbackQueue, ,) = $this->channel->queue_declare(
            "",
            false,
            false,
            true,
            false
        );

        $this->channel->basic_consume(
            $this->callbackQueue,
            '',
            false,
            true,
            false,
            false,
            array(
                $this,
                'onResponse'
            )
        );
    }

    /**
     * @param $rpcResponse
     */
    public function onResponse($rpcResponse)
    {
        if ($rpcResponse->get('correlation_id') === $this->correlationId) {
            $this->response = $rpcResponse->body;
        }
    }

    /**
     * @param $n
     * @return int
     * @throws ErrorException
     */
    public function call($n)
    {
        $this->response = null;
        $this->correlationId = uniqid();

        $msg = new AMQPMessage(
            (string) $n,
            array(
                'correlation_id' => $this->correlationId,
                'reply_to' => $this->callbackQueue
            )
        );
        $this->channel->basic_publish($msg, '', 'rpc_queue');
        while (!$this->response) {
            $this->channel->wait();
        }
        return intval($this->response);
    }
}

$fibonacci_rpc = new FibonacciRpcClient(
    'localhost',
    5672,
    'rabbitmq',
    'rabbitmqpass'
);
$response = $fibonacci_rpc->call(30);
echo ' [.] Got ', $response, "\n";