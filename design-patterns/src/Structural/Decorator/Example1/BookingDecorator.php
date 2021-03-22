<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example1;

/**
 * Class BookingDecorator
 * @package App\Structural\Decorator
 */
abstract class BookingDecorator implements Booking
{
    /**
     * @var Booking
     */
    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
}