<?php

declare(strict_types=1);

namespace App\Navigator;

final class Path
{
    /**
     * @var int
     */
    private $distance;

    /**
     * @var int
     */
    private $speedLimit;

    /**
     * @var int
     */
    private $traffic;

    public function __construct(int $distance, int $speedLimit, int $traffic)
    {
        $this->distance = $distance;
        $this->speedLimit = $speedLimit;
        $this->traffic = $traffic;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @return int
     */
    public function getSpeedLimit(): int
    {
        return $this->speedLimit;
    }

    /**
     * @return int
     */
    public function getTraffic(): int
    {
        return $this->traffic;
    }
}