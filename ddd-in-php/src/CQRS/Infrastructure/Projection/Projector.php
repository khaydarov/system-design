<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Projection;

/**
 *
 */
class Projector
{
    private $projections = [];

    /**
     * @param array $projections
     */
    public function register(array $projections): void
    {
        /** @var Projection $projection */
        foreach ($projections as $projection) {
            $this->projections[$projection->listensTo()] = $projection;
        }
    }

    /**
     * @param array $events
     */
    public function project(array $events): void
    {
        foreach ($events as $event) {
            $class = get_class($event);
            if (isset($this->projections[$class])) {
                $this->projections[$class]->project($event);
            }
        }
    }
}