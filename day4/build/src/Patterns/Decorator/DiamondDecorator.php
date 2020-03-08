<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

/**
 * Class DiamondDecorator
 * @package App\Patterns\Decorator
 */
class DiamondDecorator extends TileDecorator
{
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() + 2;
    }
}