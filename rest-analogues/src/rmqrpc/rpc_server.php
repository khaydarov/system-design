<?php

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

require_once '../../vendor/autoload.php';

class FibonacciRpcServer
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
     * FibonacciRpcServer constructor.
     * @param string $host
     * @param int $port
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

        $this->channel->basic_qos(null, 1, null);
        $this->channel->basic_consume(
            'rpc_queue',
            '',
            false,
            false,
            false,
            false,
            [$this, 'execute']
        );

        echo " [x] Awaiting RPC requests\n";

        while ($this->channel->is_consuming()) {
            $this->channel->wait();
        }
    }

    public function execute($request)
    {
        $n = intval($request->body);
        echo ' [.] fib(', $n, ")\n";

        $msg = new AMQPMessage(
            (string) $this->fib($n),
            array('correlation_id' => $request->get('correlation_id'))
        );

        $request->delivery_info['channel']->basic_publish(
            $msg,
            '',
            $request->get('reply_to')
        );
        $request->ack();
    }

    /**
     * @param $n
     * @return int
     */
    private function fib($n): int
    {
        if ($n == 0) {
            return 0;
        }
        if ($n == 1) {
            return 1;
        }

        return $this->fib($n - 1) + $this->fib($n - 2);
    }
}

$server = new FibonacciRpcServer('localhost', 5672, 'rabbitmq', 'rabbitmqpass');