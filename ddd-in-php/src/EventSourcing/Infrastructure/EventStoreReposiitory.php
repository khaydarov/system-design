<?php

declare(strict_types=1);

namespace App\EventSourcing;

use App\CQRS\Infrastructure\Projection\Projector;
use App\CQRS\Domain\Post;
use App\CQRS\Domain\PostId;
use App\CQRS\Domain\PostRepository;

class EventStoreReposiitory implements PostRepository
{
    private $eventStore;
    private $projector;
    private $snapshotRepository;

    public function __construct($eventStore, Projector $projector, SnapshotRepository $snapshotRepository)
    {
        $this->eventStore = $eventStore;
        $this->projector = $projector;
        $this->snapshotRepository = $snapshotRepository;
    }

    public function save(Post $post)
    {
        $id = $post->getId();
        $events = $post->getRecordedEvents();
        $post->clearEvents();

        $this->eventStore->append(new EventStream($id, $events));
        $version = 1; // calc version: count($this->eventStore) / 100;

        if (!$this->snapshotRepository->has($id->getValue(), $version)) {
            $this->snapshotRepository->save($id, new Snapshot($version, [
                'data' => $events
            ]));
        }

        $this->projector->project($events);
    }

    public function findById(PostId $id)
    {
        $snapshot = $this->snapshotRepository->byId($id);

        if ($snapshot === null) {
            Post::reconstitute(
                $this->eventStore->getEventsFor($id)
            );
        }

        return $snapshot->aggregate();
    }
}