<?php

declare(strict_types=1);

namespace App\PatkingLot;

use App\ParkingLot\VehicleType\VehicleType;

class Vehicle
{
    /**
     * @var string
     */
    private $licenceNumber;

    /**
     * @var VehicleType
     */
    private $type;

    /**
     * @var ParkingTicket
     */
    private $parkingTicket;

    public function __construct(string $licenceNumber, VehicleType $type)
    {
        $this->licenceNumber = $licenceNumber;
        $this->type = $type;
    }

    /**
     * @return VehicleType
     */
    public function getType(): VehicleType
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getLicenceNumber(): string
    {
        return $this->licenceNumber;
    }

    /**
     * @param ParkingTicket $parkingTicket
     */
    public function assignTicket(ParkingTicket $parkingTicket): void
    {
        $this->parkingTicket = $parkingTicket;
    }

    /**
     * @return ParkingTicket|null
     */
    public function getParkingTicket(): ?ParkingTicket
    {
        return $this->parkingTicket;
    }
}