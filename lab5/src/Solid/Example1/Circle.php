<?php
declare(strict_types=1);

namespace App\Solid\Example1;

/**
 * Class Circle
 * @package App\Solid
 */
class Circle implements ShapeInterface
{
    /**
     * @var int
     */
    private $radius;

    /**
     * Circle constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function area(): float
    {
        return 3.14 * $this->radius * $this->radius;
    }
}
