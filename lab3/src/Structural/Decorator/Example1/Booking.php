<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example1;

/**
 * Interface Booking
 * @package App\Structural\Decorator
 */
interface Booking
{
    /**
     * @return int
     */
    public function calculatePrice(): int;

    /**
     * @return string
     */
    public function getDescription(): string;
}