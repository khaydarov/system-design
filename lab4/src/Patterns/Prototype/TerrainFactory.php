<?php
declare(strict_types=1);

namespace App\Patterns\Prototype;

use App\Patterns\Prototype\Forest\Forest;
use App\Patterns\Prototype\Plains\Plains;
use App\Patterns\Prototype\Sea\Sea;

/**
 * Class TerrainFactory
 * @package App\Patterns\Prototype
 */
class TerrainFactory
{
    /**
     * @var Sea
     */
    private Sea $sea;

    /**
     * @var Plains
     */
    private Plains $plains;

    /**
     * @var Forest
     */
    private Forest $forest;

    /**
     * TerrainFactory constructor.
     *
     * @param Sea $sea
     * @param Plains $plains
     * @param Forest $forest
     */
    public function __construct(Sea $sea, Plains $plains, Forest $forest)
    {
        $this->sea = $sea;
        $this->plains = $plains;
        $this->forest = $forest;
    }

    /**
     * @return Sea
     */
    public function getSea(): Sea
    {
        return clone $this->sea;
    }

    /**
     * @return Plains
     */
    public function getPlains(): Plains
    {
        return clone $this->plains;
    }

    /**
     * @return Forest
     */
    public function getForest(): Forest
    {
        return clone $this->forest;
    }
}