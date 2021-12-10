<?php
declare(strict_types=1);

namespace App\Patterns\Strategy;

class FixedCostStrategy extends CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return int
     */
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return 'Fixed cost';
    }
}