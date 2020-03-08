<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

/**
 * Class Tile
 * @package App\Patterns\Decorator
 */
abstract class Tile
{
    /**
     * @return int
     */
    abstract public function getWealthFactor(): int;
}