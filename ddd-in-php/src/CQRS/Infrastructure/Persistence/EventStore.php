<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Persistence;

use App\CQRS\Domain\AggregateId;
use App\CQRS\Domain\DomainEvent;
use App\CQRS\Domain\EventStream;
use App\CQRS\Domain\PostId;
use Aura\Sql\ExtendedPdo;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Class EventStore
 * @package App\CQRS\Infrastructure\Persistence
 */
class EventStore
{
    /**
     * @var ExtendedPdo
     */
    private $db;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * EventStore constructor.
     * @param ExtendedPdo $db
     */
    public function __construct(ExtendedPdo $db, Serializer $serializer)
    {
        $this->db = $db;
        $this->serializer = $serializer;
    }

    /**
     * @param DomainEvent $event
     */
    public function commit(DomainEvent $event): void
    {
        $json = $this->serializer->serialize($event, 'json');

        $this->db->fetchOne(
            "INSERT INTO events(aggregate_id, type, created_at, data)
                                VALUES(:aggregate_id, :type, :created_at, :data)",
            [
                'aggregate_id' => $event->getAggregateId()->getValue(),
                'type' => get_class($event),
                'created_at' => ($event->occurredOn())->format('Y-m-d H:i:s'),
                'data' => $json
            ]
        );
    }

    /**
     * @param AggregateId $aggregateId
     *
     * @return EventStream
     */
    public function getEventsFor(AggregateId $aggregateId): EventStream
    {
        $rows = $this->db->fetchAll(
            "SELECT * FROM events WHERE aggregate_id = :aggregate_id",
            [
                'aggregate_id' => $aggregateId->getValue()
            ]
        );

        $events = [];
        foreach ($rows as $row) {
            $events[] = $this->serializer->deserialize($row['data'], $row['type'], 'json');
        }

        return new EventStream($aggregateId, $events);
    }
}