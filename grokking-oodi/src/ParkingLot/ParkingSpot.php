<?php

declare(strict_types=1);

namespace App\PatkingLot;

class ParkingSpot
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var bool
     */
    private $free;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->free;
    }
}