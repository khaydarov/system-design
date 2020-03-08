<?php
declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

abstract class ApptEncoder
{
    abstract public function encode(): string;
}