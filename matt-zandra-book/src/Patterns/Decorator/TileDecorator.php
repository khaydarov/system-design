<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

/**
 * Class TileDecorator
 * @package App\Patterns\Decorator
 */
abstract class TileDecorator extends Tile
{
    /**
     * @var Tile
     */
    protected Tile $tile;

    /**
     * TileDecorator constructor.
     * @param Tile $tile
     */
    public function __construct(Tile $tile)
    {
        $this->tile = $tile;
    }
}