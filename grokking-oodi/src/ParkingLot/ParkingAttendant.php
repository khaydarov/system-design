<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class ParkingAttendant extends Account
{
    public function processTicket(): bool
    {
        return true;
    }
}