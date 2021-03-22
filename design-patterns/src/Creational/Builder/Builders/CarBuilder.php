<?php
declare(strict_types=1);

namespace App\Creational\Builder\Builders;

use App\Creational\Builder\Parts\Engine;
use App\Creational\Builder\Parts\Wheel;
use App\Creational\Builder\Units\Car;
use App\Creational\Builder\Units\Unit;
use App\Creational\Builder\Parts\Door;

class CarBuilder implements BuilderInterface
{
    /**
     * @var Car
     */
    private $car;

    /**
     * Creates car
     */
    public function createUnit(): void
    {
        $this->car = new Car();
    }

    /**
     * @return Unit
     */
    public function getUnit(): Unit
    {
        return $this->car;
    }

    /**
     * Adds car doors
     */
    public function addDoors(): void
    {
        $this->car->setPart('leftDoor', new Door());
        $this->car->setPart('rightDoor', new Door());
    }

    /**
     * adds car engine
     */
    public function addEngine(): void
    {
        $this->car->setPart('engine', new Engine());
    }

    /**
     * adds car wheels
     */
    public function addWheels(): void
    {
        $this->car->setPart('wheelLF', new Wheel());
        $this->car->setPart('wheelRF', new Wheel());
        $this->car->setPart('wheelLR', new Wheel());
        $this->car->setPart('wheelRR', new Wheel());
    }
}