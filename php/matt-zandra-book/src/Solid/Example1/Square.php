<?php

declare(strict_types=1);

namespace App\Solid\Example1;

/**
 * Class Square
 * @package App\Solid
 */
class Square implements ShapeInterface
{
    /**
     * @var int
     */
    public $length;

    /**
     * Square constructor.
     * @param $length
     */
    public function __construct($length)
    {
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function area(): float
    {
        return $this->length * $this->length;
    }
}
