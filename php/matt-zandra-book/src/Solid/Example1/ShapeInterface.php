<?php
declare(strict_types=1);

namespace App\Solid\Example1;

/**
 * Interface ShapeInterface
 * @package App\Solid
 */
interface ShapeInterface
{
    /**
     * @return float
     */
    public function area(): float;
}