<?php
declare(strict_types=1);

namespace App\Patterns\NullObject;

use App\Patterns\Composite\Unit;

/**
 * Class NullUnit
 * @package App\Patterns\NullObject
 */
class NullUnit extends Unit
{
    public function bombardStrength(): int
    {
        return 0;
    }
}