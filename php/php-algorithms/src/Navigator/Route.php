<?php

declare(strict_types=1);

namespace App\Navigator;

class Route
{
    /**
     * @var Path[]
     */
    private $paths;

    public function __construct(array $paths)
    {
        $this->paths = $paths;
    }

    /**
     * Returns time that will be spent for route
     *
     * @return float
     */
    public function calculateTime(): float
    {
        $time = 0;
        foreach ($this->paths as $path) {
            $timeForPath = $path->getDistance() / $path->getSpeedLimit();
            $time += $timeForPath / $path->getTraffic();
        }

        return $time;
    }

    /**
     * Returns distance
     *
     * @return int
     */
    public function calculateDistance(): int
    {
        $distance = 0;
        foreach ($this->paths as $path) {
            $distance += $path->getDistance();
        }

        return $distance;
    }
}