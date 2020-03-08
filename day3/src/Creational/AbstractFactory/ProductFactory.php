<?php
declare(strict_types=1);

namespace App\Creational\AbstractFactory;


class ProductFactory
{
    public function createShippableProduct(int $price): Product
    {
        return new ShippableProduct($price, 10);
    }

    public function createDigitalProduct(int $price): Product
    {
        return new DigitalProduct($price);
    }
}