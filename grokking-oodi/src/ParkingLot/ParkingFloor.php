<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class ParkingFloor
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function updateDisplayBoard(): void
    {
    }

    public function addParkingSlot(): void
    {
    }

    public function assignVehicleToSlot(): void
    {
    }

    public function freeSlot(): void
    {
    }
}