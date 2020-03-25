<?php
declare(strict_types=1);

use App\Behavioral\Mediator\Example1\Mediator;
use App\Behavioral\Mediator\Example1\Subsystem\Client;
use App\Behavioral\Mediator\Example1\Subsystem\Database;
use App\Behavioral\Mediator\Example1\Subsystem\Server;
use PHPUnit\Framework\TestCase;

class MediatorTest extends TestCase
{
    public function testOutputHelloWorld()
    {
        $client = new Client();
        new Mediator(new Database(), $client, new Server());

        $this->expectOutputString('Hello World');
        $client->request();
    }
}