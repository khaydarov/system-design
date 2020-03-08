<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Creational\SimpleFactory\Bycicle;
use \App\Creational\SimpleFactory\SimpleFactory;

class SimpleFactoryTest extends TestCase
{
    public function testCanCreateBicycle()
    {
        $bicycle = (new SimpleFactory())->createBicycle();
        $this->assertInstanceOf(Bycicle::class, $bicycle);
    }
}