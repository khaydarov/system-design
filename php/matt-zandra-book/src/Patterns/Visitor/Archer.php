<?php
declare(strict_types=1);

namespace App\Patterns\Visitor;

/**
 * Class Archer
 * @package App\Patterns\Composite
 */
class Archer extends Unit
{
    public function bombardStrength(): int
    {
        return 4;
    }
}