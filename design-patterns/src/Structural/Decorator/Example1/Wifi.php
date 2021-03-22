<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example1;

/**
 * Class Wifi
 * @package App\Structural\Decorator
 */
class Wifi extends BookingDecorator
{
    private const PRICE = 2;

    /**
     * @return int
     */
    public function calculatePrice(): int
    {
        return $this->booking->calculatePrice() + self::PRICE;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->booking->getDescription() . ' with wifi';
    }
}