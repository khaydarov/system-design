<?php

declare(strict_types=1);

namespace App\PatkingLot;

final class ParkingSpotType
{
    public const HANDICAPPED = 1;
    public const COMPACT = 2;
    public const LARGE = 3;
    public const MOTOBIKE = 4;
    public const ELECTRIC = 5;

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
    public static function handicapped(): self
    {
        return new self(self::HANDICAPPED);
    }

    /**
     * @return static
     */
    public static function compact(): self
    {
        return new self(self::COMPACT);
    }
}