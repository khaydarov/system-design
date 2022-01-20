<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class Admin extends Account
{
    public function addParkingFloor(): bool
    {
        return true;
    }

    /**
     * @param ParkingFloor $floor
     * @param ParkingSpot $spot
     *
     * @return bool
     */
    public function addParkingSpot(ParkingFloor $floor, ParkingSpot $spot): bool
    {
        $floor->addParkingSlot($spot);

        return true;
    }

//    public function addParkingDisplayBoard(ParkingFloor $floor)
}