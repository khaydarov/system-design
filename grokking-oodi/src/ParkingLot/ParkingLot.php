<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class ParkingLot
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var Location
     */
    private $address;

    public function __construct(string $id, Location $address)
    {
        $this->id = $id;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Location
     */
    public function getAddress(): Location
    {
        return $this->address;
    }

    public function addParkingFloor(): bool
    {
        return true;
    }

    public function addEntrancePanel(): bool
    {
        return true;
    }

    public function getNewParkingTicket(): bool
    {
        return true;
    }

    public function isFull(): bool
    {
        return true;
    }
}