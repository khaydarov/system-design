<?php
declare(strict_types=1);

namespace App\Behavioral\Specification;

/**
 * Class Item
 * @package App\Behavioral\Specification
 */
class Item
{
    /**
     * @var float
     */
    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}