<?php
declare(strict_types=1);

namespace App\Creational\FactoryMethod;

use App\Creational\FactoryMethod\Logger\FileLogger;
use App\Creational\FactoryMethod\Logger\Logger;

class FileLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new FileLogger('/var/logs/php.log');
    }
}