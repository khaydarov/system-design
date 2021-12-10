<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Projection;

// Projector is used to sync (via RMQ) Write and Read models
// Write model uses Repo to persist data and sends events to be handled on Read models side
class AsyncProjector
{
    private $producer;
    private $serializer;

    public function __construct($producer, $serializer)
    {
        $this->producer = $producer;
        $this->serializer = $serializer;
    }

    public function project(array $events)
    {
        foreach ($events as $event) {
            $this->producer->publish(
                $this->serializer->serialize($event, 'json')
            );
        }
    }
}