<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Class Book
 * @package App\Solid\Example2
 */
class Book implements ItemInterface, DiscountableInterface
{
    public function setCondition($condition)
    {
        // TODO: Implement setCondition() method.
    }

    public function setPrice($price)
    {
        // TODO: Implement setPrice() method.
    }

    public function applyDiscount($discount)
    {
        // TODO: Implement applyDiscount() method.
    }

    public function applyPromocode($promocode)
    {
        // TODO: Implement applyPromocode() method.
    }
}
