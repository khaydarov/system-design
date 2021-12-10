<?php
declare(strict_types=1);

namespace App\Solid\Example1;

/**
 * Class Cuboid
 * @package App\Solid
 */
class Cuboid implements ShapeInterface, SolidShapeInterface
{
    public function area(): float
    {
        return 1;
    }

    public function volume(): float
    {
        return 2;
    }
}
