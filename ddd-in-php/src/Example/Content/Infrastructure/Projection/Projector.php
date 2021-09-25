<?php

declare(strict_types=1);

namespace App\Example\Content\Infrastructure\Projection;

class Projector
{
    /**
     * @var array
     */
    private $projections = [];

    /**
     * Projector constructor.
     * @param array $projections
     */
    public function __construct(array $projections)
    {
        $this->projections = $projections;
    }

    /**
     * @param $event
     */
    public function project($event)
    {
        /** @var Projection $projection */
        foreach ($this->projections as $projection) {
            if ($projection->listen() === get_class($event)) {
                $projection->handle($event);
            }
        }
    }
}