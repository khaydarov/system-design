<?php
declare(strict_types=1);

namespace App\Solid\Example1;

class AreaCalculator
{
    /**
     * @var ShapeInterface[]
     */
    protected $shapes = [];

    public function __construct($shapes = [])
    {
        $this->shapes = $shapes;
    }

    /**
     * @return float
     */
    public function sum(): float
    {
        $areas = [];
        foreach ($this->shapes as $shape) {
            $areas[] = $shape->area();
        }

        return array_sum($areas);
    }
}