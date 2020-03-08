<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Creational\Prototype\FooBookPrototype;
use \App\Creational\Prototype\BarBookPrototype;

class PrototypeTest extends TestCase
{
    public function testCanGetFooBook()
    {
        $foo_prototype = new FooBookPrototype();
        $bar_prototype = new BarBookPrototype();

        for($i = 0; $i < 10; $i++) {
            $book = clone $foo_prototype;
            $book->setTitle('Foo Book No ' . $i);
            $this->assertInstanceOf(FooBookPrototype::class, $book);
        }

        for($i = 0; $i < 5; $i++) {
            $book = clone $bar_prototype;
            $book->setTitle('Bar Book No ' . $i);
            $this->assertInstanceOf(BarBookPrototype::class, $book);
        }
    }
}