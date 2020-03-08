<?php
declare(strict_types=1);

namespace App\Patterns\Visitor;

/**
 * Class LaserCannon
 * @package App\Patterns\Composite
 */
class LaserCannon extends Unit
{
    public function bombardStrength(): int
    {
        return 44;
    }
}