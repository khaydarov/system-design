<?php
declare(strict_types=1);

namespace App\Patterns\Composite;

/**
 * Class Army
 * @package App\Patterns\Composite
 */
class Army extends CompositeUnit
{
    /**
     * @return int
     */
    public function bombardStrength(): int
    {
        $val = 0;
        foreach ($this->getUnits() as $unit) {
            $val += $unit->bombardStrength();
        }

        return $val;
    }
}