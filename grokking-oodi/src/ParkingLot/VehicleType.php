<?php

declare(strict_types=1);

namespace App\ParkingLot\VehicleType;

final class VehicleType
{
    public const CAR = 1;
    public const TRUCK = 2;
    public const ELECTRIC = 3;
    public const VAN = 4;
    public const MOTOBIKE = 5;

    /**
     * @var int
     */
    private $type;

    public function __construct(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return static
     */
    public static function car(): self
    {
        return new self(self::CAR);
    }

    /**
     * @return static
     */
    public static function truck(): self
    {
        return new self(self::TRUCK);
    }
}