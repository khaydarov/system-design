<?php
declare(strict_types=1);

namespace App\Behavioral\Mediator\Example1;

use App\Behavioral\Mediator\Example1\Subsystem\Client;
use App\Behavioral\Mediator\Example1\Subsystem\Database;
use App\Behavioral\Mediator\Example1\Subsystem\Server;

class Mediator implements MediatorInterface
{
    /**
     * @var Server
     */
    private $server;

    /**
     * @var Database
     */
    private $database;

    /**
     * @var Client
     */
    private $client;

    public function __construct(Database $database, Client $client, Server $server)
    {
        $this->database = $database;
        $this->client = $client;
        $this->server = $server;

        $this->database->setMediator($this);
        $this->server->setMediator($this);
        $this->client->setMediator($this);
    }

    public function makeRequest()
    {
        $this->server->process();
    }

    public function queryDb()
    {
        return $this->database->getData();
    }

    public function sendResponse($content)
    {
        $this->client->output($content);
    }
}