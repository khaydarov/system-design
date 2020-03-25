<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Creational\FactoryMethod\StdoutLoggerFactory;
use \App\Creational\FactoryMethod\FileLoggerFactory;
use \App\Creational\FactoryMethod\Logger\StdoutLogger;
use \App\Creational\FactoryMethod\Logger\FileLogger;

class FactoryMethod extends TestCase
{
    public function testStdoutLoggerFactory()
    {
        $factory = new StdoutLoggerFactory();
        $logger = $factory->createLogger();

        $this->assertInstanceOf(StdoutLogger::class, $logger);
    }

    public function testFileLoggerFactory()
    {
        $factory = new FileLoggerFactory();
        $logger = $factory->createLogger();

        $this->assertInstanceOf(FileLogger::class, $logger);
    }
}