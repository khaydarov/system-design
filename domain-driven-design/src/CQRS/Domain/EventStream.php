<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

class EventStream
{
    /**
     * @var AggregateId
     */
    private $aggregateId;

    /**
     * @var array
     */
    private $events;

    public function __construct(AggregateId $aggregateId, array $events)
    {
        $this->aggregateId = $aggregateId;
        $this->events = $events;
    }

    /**
     * @return AggregateId
     */
    public function getAggregateId(): AggregateId
    {
        return $this->aggregateId;
    }

    /**
     * @return array
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->events);
    }
}