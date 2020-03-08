<?php
declare(strict_types=1);

namespace App\Creational\Builder\Builders;

use App\Creational\Builder\Units\Unit;

interface BuilderInterface
{
    public function createUnit(): void;
    public function getUnit(): Unit;
    public function addDoors(): void;
    public function addEngine(): void;
    public function addWheels(): void;
}