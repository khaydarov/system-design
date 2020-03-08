<?php
declare(strict_types=1);

namespace App\Patterns\NullObject;

use App\Patterns\Composite\Unit;

/**
 * Class TileForces
 * @package App\Patterns\NullObject
 */
class TileForces
{
    /**
     * @var Unit[]
     */
    private $units = [];

    /**
     * @var int
     */
    private int $x;

    /**
     * @var int
     */
    private int $y;

    public function __construct(int $x, int $y, UnitAcquisition $acq)
    {
        $this->x = $x;
        $this->y = $y;

        $this->units = $acq->getUnits($this->x, $this->y);
    }

    public function firePower(): int
    {
        $power = 0;
        foreach ($this->units as $unit) {
            $power += $unit->bombardStrength();
        }

        return $power;
    }
}