<?php
declare(strict_types=1);

namespace App\Patterns\Composite;

/**
 * Class Unit
 * @package App\Patterns\Composite
 */
abstract class Unit
{
    /**
     * @return null
     */
    public function getComposite()
    {
        return null;
    }

    /**
     * @return int
     */
    public function unitsCount()
    {
        return 1;
    }

    /**
     * @return int
     */
    abstract public function bombardStrength(): int;
}