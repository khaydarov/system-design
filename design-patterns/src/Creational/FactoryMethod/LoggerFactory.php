<?php
declare(strict_types=1);

namespace App\Creational\FactoryMethod;

use App\Creational\FactoryMethod\Logger\Logger;

interface LoggerFactory
{
    public function createLogger(): Logger;
}