<?php

declare(strict_types=1);

namespace App\EventSourcing\Infrastructure;

use App\CQRS\Domain\PostId;
use \App\CQRS\Infrastructure\Persistence\EventStore as BaseEventStore;

class EventStore extends \App\CQRS\Infrastructure\Persistence\EventStore
{
    public function getEventsFor(PostId $id)
    {
//        $serializedEvents = $this->redis->lrange('events:' . $id, 0, -1);
//        $eventStream = [];
//
//        foreach ($serializedEvents as $serializedEvent) {
//            $data = $this->serializer->deserialize($serializedEvent, 'array', 'json');
//            $eventStream[] = $this->serializer->deserialize(
//                $data['data'],
//                $data['type'],
//                'json'
//            );
//        }

//        return new EventStream($id, $eventStream);
    }
}