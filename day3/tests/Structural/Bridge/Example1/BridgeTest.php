<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Structural\Bridge\Example1\HtmlFormatter;
use \App\Structural\Bridge\Example1\PlainTextFormatter;
use \App\Structural\Bridge\Example1\HelloWorldService;
use \App\Structural\Bridge\Example1\PingService;

class BridgeTest extends TestCase
{
    public function testCanPrintUsingThePlainTextFormatter()
    {
        $service = new HelloWorldService(new PlainTextFormatter());
        $this->assertSame('Hello', $service->get());

        $another_service = new PingService(new PlainTextFormatter());
        $this->assertSame('pong', $another_service->get());
    }

    public function testCanPrintUsingTheHtmlFormatter()
    {
        $service = new HelloWorldService(new HtmlFormatter());
        $this->assertSame('<p>Hello</p>', $service->get());

        $another_service = new PingService(new HtmlFormatter());
        $this->assertSame('<p>pong</p>', $another_service->get());
    }
}