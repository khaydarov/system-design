<?php
declare(strict_types=1);

namespace App\Patterns\Strategy;

abstract class Lesson
{
    /**
     * @var CostStrategy
     */
    private CostStrategy $costStrategy;

    /**
     * @var int
     */
    private int $duration;

    /**
     * Lesson constructor.
     *
     * @param int $duration
     * @param CostStrategy $strategy
     */
    public function __construct(int $duration, CostStrategy $strategy)
    {
        $this->costStrategy = $strategy;
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }
}