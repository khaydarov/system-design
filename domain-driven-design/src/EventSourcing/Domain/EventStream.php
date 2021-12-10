<?php

declare(strict_types=1);

namespace App\EventSourcing\Domain;

use App\CQRS\Domain\DomainEvent;
use App\CQRS\Domain\PostId;

/**
 * Class EventStream
 * @package App\EventSourcing\Domain
 */
class EventStream
{
    /**
     * @var PostId
     */
    private $aggregateId;

    /**
     * @var DomainEvent[]
     */
    private $events;

    public function __construct($aggregateId, $events)
    {
        $this->aggregateId = $aggregateId;
        $this->events = $events;
    }

    public function getAggregateId(): PostId
    {
        return $this->aggregateId;
    }

    /**
     * @return DomainEvent[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }
}