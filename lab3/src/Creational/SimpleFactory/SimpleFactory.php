<?php
declare(strict_types=1);

namespace App\Creational\SimpleFactory;

class SimpleFactory
{
    public function createBicycle(): Bycicle
    {
        return new Bycicle();
    }
}