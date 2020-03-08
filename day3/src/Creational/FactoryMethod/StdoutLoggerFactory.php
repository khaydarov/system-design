<?php
declare(strict_types=1);

namespace App\Creational\FactoryMethod;

use App\Creational\FactoryMethod\Logger\Logger;
use App\Creational\FactoryMethod\Logger\StdoutLogger;

class StdoutLoggerFactory implements LoggerFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}