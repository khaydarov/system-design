<?php

declare(strict_types=1);

namespace App\Console;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Consumer extends Command
{
    protected static $defaultName = 'app:consumer';

    /**
     * @var AMQPStreamConnection
     */
    private $connection;

    public function __construct(AMQPStreamConnection $connection, string $name = null)
    {
        $this->connection = $connection;

        parent::__construct($name);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $channel = $this->connection->channel();

        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };

        $channel->queue_declare('hello', false, false, false, false);
        $channel->basic_consume('hello', '', false, true, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }
    }
}