<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Creational\StaticFactory\StaticFactory;
use \App\Creational\StaticFactory\FormatNumber;
use \App\Creational\StaticFactory\FormatString;

class StaticFactoryTest extends TestCase
{
    public function testCanCreateNumberFormatter()
    {
        $this->assertInstanceOf(FormatNumber::class,
            StaticFactory::factory('number')
        );
    }

    public function testCanCreateStringFormatter()
    {
        $this->assertInstanceOf(FormatString::class,
            StaticFactory::factory('string')
        );
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        StaticFactory::factory('object');
    }
}