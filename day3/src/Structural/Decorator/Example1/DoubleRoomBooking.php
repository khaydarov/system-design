<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example1;

/**
 * Class DoubleRoomBooking
 * @package App\Structural\Decorator
 */
class DoubleRoomBooking implements Booking
{
    public function calculatePrice(): int
    {
        return 40;
    }

    public function getDescription(): string
    {
        return 'double room';
    }
}