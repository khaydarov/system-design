<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class ParkingFloor
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $handicappedSpots = [];

    /**
     * @var array
     */
    private $compactSpots = [];

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

    public function addParkingSpot(ParkingSpot $spot): void
    {
        switch ($spot->getType()) {
            case ParkingSpotType::HANDICAPPED:
                $this->handicappedSpots[$spot->getNumber()] = $spot;
                break;
            case ParkingSpotType::COMPACT:
                $this->compactSpots[$spot->getNumber()] = $spot;
                break;
        }
    }

    public function assignVehicleToSpot(Vehicle $vehicle, ParkingSpot $spot): void
    {
        $spot->assignVehicle($vehicle);
    }

    public function freeSpot(ParkingSpot $spot): void
    {
        $spot->removeVehicle();
    }
}