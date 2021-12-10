<?php
declare(strict_types=1);

namespace App\Patterns\Strategy;

class TimedCostStrategy extends CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return int
     */
    public function cost(Lesson $lesson): int
    {
        return 5 * $lesson->getDuration();
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return 'Timed cost';
    }
}