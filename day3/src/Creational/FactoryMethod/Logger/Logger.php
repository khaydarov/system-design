<?php
declare(strict_types=1);

namespace App\Creational\FactoryMethod\Logger;

interface Logger
{
    public function log(string $message): void;
}