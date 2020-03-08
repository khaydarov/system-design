<?php
declare(strict_types=1);

namespace App\Patterns\Strategy;

abstract class CostStrategy
{
    abstract public function cost(Lesson $lesson): int;
    abstract public function chargeType(): string;
}