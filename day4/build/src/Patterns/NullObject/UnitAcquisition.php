<?php
declare(strict_types=1);

namespace App\Patterns\NullObject;

use App\Patterns\Composite\Archer;
use App\Patterns\Composite\Army;
use App\Patterns\Visitor\LaserCannon;

/**
 * Class UnitAcquisition
 * @package App\Patterns\NullObject
 */
class UnitAcquisition
{
    public function getUnits(int $x, int $y): array
    {
        $army = new Army();
        $army->addUnit(new Archer());

        $found = [
            new Army(),
            new NullUnit(),
            new LaserCannon(),
            $army
        ];

        return $found;
    }
}