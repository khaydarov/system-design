<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Persistence;

use App\CQRS\Domain\Post;
use App\CQRS\Domain\PostId;
use App\CQRS\Domain\PostRepository;
use App\CQRS\Infrastructure\Projection\Projector;

/**
 * Class PostPsqlRepository
 * @package App\CQRS\Infrastructure\Persistence
 */
class PostPsqlRepository implements PostRepository
{
    /**
     * @var Projector
     */
    private $projector;

    /**
     * @var EventStore
     */
    private $eventStore;

    /**
     * PsqlRepository constructor.
     * @param EventStore $eventStore
     * @param Projector $projector
     */
    public function __construct(EventStore $eventStore, Projector $projector)
    {
        $this->eventStore = $eventStore;
        $this->projector = $projector;
    }

    /**
     * @param Post $post
     */
    public function save(Post $post): void
    {
        foreach ($post->getRecordedEvents() as $event) {
            $this->eventStore->commit($event);
        }

        // third: emit event
        $this->projector->project($post->getRecordedEvents());
    }

    /**
     * @param PostId $postId
     * @return Post|null
     */
    public function findById(PostId $postId): ?Post
    {
        $stream = $this->eventStore->getEventsFor($postId);

        if ($stream->isEmpty()) {
            return null;
        }

        return Post::reconstitute($stream);
    }
}