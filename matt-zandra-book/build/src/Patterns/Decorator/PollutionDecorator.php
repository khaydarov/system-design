<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

/**
 * Class PollutionDecorator
 * @package App\Patterns\Decorator
 */
class PollutionDecorator extends TileDecorator
{
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() - 4;
    }
}