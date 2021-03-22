<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Interface DiscountableInterface
 * @package App\Solid\Example2
 */
interface DiscountableInterface
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);
}