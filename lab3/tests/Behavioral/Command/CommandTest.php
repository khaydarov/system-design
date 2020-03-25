<?php
declare(strict_types=1);

use App\Behavioral\Command\Example1\HelloCommand;
use App\Behavioral\Command\Example1\Invoker;
use App\Behavioral\Command\Example1\Receiver;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function testInvocation()
    {
        $invoker = new Invoker();
        $receiver = new Receiver();

        $invoker->setCommand(new HelloCommand($receiver));
        $invoker->run();

        $this->assertSame('Hello, World', $receiver->getOutput());
    }
}