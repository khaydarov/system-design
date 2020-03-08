<?php
declare(strict_types=1);

namespace App\Creational\AbstractFactory;

class ShippableProduct implements Product
{
    /**
     * @var int
     */
    private $product_price = 0;

    /**
     * @var int
     */
    private $shipping_costs = 0;

    /**
     * ShippableProduct constructor.
     * @param int $product_price
     * @param int $shipping_costs
     */
    public function __construct(int $product_price, int $shipping_costs)
    {
        $this->product_price = $product_price;
        $this->shipping_costs = $shipping_costs;
    }

    /**
     * @return int
     */
    public function calculatePrice(): int
    {
        return $this->product_price + $this->shipping_costs;
    }
}