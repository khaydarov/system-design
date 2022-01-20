<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class ParkingSpot
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var ParkingSpotType
     */
    private $type;

    /**
     * @var Vehicle
     */
    private $vehicle;

    /**
     * @var bool
     */
    private $free;

    public function __construct(string $number, ParkingSpotType $spotType)
    {
        $this->number = $number;
        $this->type = $spotType;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    public function assignVehicle(Vehicle $vehicle): void
    {
        $this->vehicle = $vehicle;
        $this->free = false;
    }

    public function removeVehicle(): void
    {
        $this->vehicle = null;
        $this->free = true;
    }

    /**
     * @return bool
     */
    public function isFree(): bool
    {
        return $this->free;
    }

    /**
     * @return Vehicle|null
     */
    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    /**
     * @return ParkingSpotType
     */
    public function getType(): ParkingSpotType
    {
        return $this->type;
    }
}