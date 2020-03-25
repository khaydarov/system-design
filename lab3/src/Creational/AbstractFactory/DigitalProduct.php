<?php
declare(strict_types=1);

namespace App\Creational\AbstractFactory;

class DigitalProduct implements Product
{
    /**
     * @var int
     */
    private $product_price = 0;

    /**
     * DigitalProduct constructor.
     * @param int $product_price
     */
    public function __construct(int $product_price)
    {
        $this->product_price = $product_price;
    }

    /**
     * @return int
     */
    public function calculatePrice(): int
    {
        return $this->product_price;
    }
}