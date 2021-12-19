<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class Admin extends Account
{
    public function addParkingFloor(): bool
    {
        return true;
    }
}