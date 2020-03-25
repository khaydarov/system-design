<?php
declare(strict_types=1);

namespace App\Creational\Builder\Builders;

use App\Creational\Builder\Parts\Door;
use App\Creational\Builder\Parts\Engine;
use App\Creational\Builder\Parts\Wheel;
use App\Creational\Builder\Units\Truck;
use App\Creational\Builder\Units\Unit;

class TruckBuilder implements BuilderInterface
{
    /**
     * @var Truck
     */
    private $truck;

    /**
     * Creates Truck
     */
    public function createUnit(): void
    {
        $this->truck = new Truck();
    }

    /**
     * @return Unit
     */
    public function getUnit(): Unit
    {
        return $this->truck;
    }

    /**
     * Adds car doors
     */
    public function addDoors(): void
    {
        $this->truck->setPart('leftDoor', new Door());
        $this->truck->setPart('rightDoor', new Door());
    }

    /**
     * adds car engine
     */
    public function addEngine(): void
    {
        $this->truck->setPart('engine', new Engine());
    }

    /**
     * adds car wheels
     */
    public function addWheels(): void
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
        $this->truck->setPart('wheel4', new Wheel());
        $this->truck->setPart('wheel5', new Wheel());
        $this->truck->setPart('wheel6', new Wheel());
    }
}