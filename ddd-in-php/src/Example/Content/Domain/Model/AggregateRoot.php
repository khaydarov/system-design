<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model;

abstract class AggregateRoot
{
    /**
     * @var array
     */
    private $events = [];

    /**
     * @param DomainEvent $domainEvent
     */
    public function recordEvent(DomainEvent $domainEvent)
    {
        $this->events[] = $domainEvent;
    }

    /**
     * @return array
     */
    public function getRecordedEvents()
    {
        return $this->events;
    }
}