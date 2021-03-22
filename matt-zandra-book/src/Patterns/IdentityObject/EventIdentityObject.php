<?php
declare(strict_types=1);

namespace App\Patterns\IdentityObject;

/**
 * Class EventIdentityObject
 * @package App\Patterns\IdentityObject
 */
class EventIdentityObject extends IdentityObject
{
    private int $start;
    private int $minStart;

    public function setMinimumStart(int $minStart)
    {
        $this->minStart = $minStart;
    }

    public function getMinimumStart(): int
    {
        return $this->minStart;
    }

    public function setStart(int $start)
    {
        $this->start = $start;
    }

    public function getStart(): int
    {
        return $this->start;
    }
}