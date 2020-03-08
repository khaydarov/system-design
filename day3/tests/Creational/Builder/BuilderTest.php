<?php
declare(strict_types=1);

use App\Creational\Builder\Units\Car;
use App\Creational\Builder\Units\Truck;
use \PHPUnit\Framework\TestCase;
use \App\Creational\Builder\Director;
use \App\Creational\Builder\Builders\TruckBuilder;
use \App\Creational\Builder\Builders\CarBuilder;

class BuilderTest extends TestCase
{
    /**
     * @var Director
     */
    public $fixture = null;

    public function setUp(): void
    {
        $this->fixture = new Director();
    }

    public function testTruckBuilder()
    {
        $truckBuilder = new TruckBuilder();
        $truck = $this->fixture->build($truckBuilder);

        $this->assertInstanceOf(Truck::class, $truck);
        $this->assertTrue($truck->details() === 9);
    }

    public function testCarBuilder()
    {
        $carBuilder = new CarBuilder();
        $car = $this->fixture->build($carBuilder);

        $this->assertInstanceOf(Car::class, $car);
        $this->assertTrue($car->details() === 7);
    }
}