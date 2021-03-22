<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

/**
 * Class Plains
 * @package App\Patterns\Decorator
 */
class Plains extends Tile
{
    /**
     * @var int
     */
    private $wealthFactor = 2;

    /**
     * @return int
     */
    public function getWealthFactor(): int
    {
        return $this->wealthFactor;
    }
}