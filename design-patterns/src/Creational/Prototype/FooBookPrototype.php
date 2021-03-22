<?php
declare(strict_types=1);

namespace App\Creational\Prototype;

class FooBookPrototype extends BookPrototype
{
    /**
     * @var string
     */
    protected $category = 'Foo';

    public function __clone()
    {
    }
}