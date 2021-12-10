<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Persistence;

use App\CQRS\Domain\Comment;
use App\CQRS\Domain\CommentId;
use App\CQRS\Domain\CommentRepository;
use App\CQRS\Infrastructure\Projection\Projector;

/**
 * Class CommentPsqlRepository
 * @package App\CQRS\Infrastructure\Persistence
 */
class CommentPsqlRepository implements CommentRepository
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
     * @param Comment $comment
     */
    public function save(Comment $comment): void
    {
        foreach ($comment->getRecordedEvents() as $event) {
            $this->eventStore->commit($event);
        }

        // third: emit event
        $this->projector->project($comment->getRecordedEvents());
    }

    /**
     * @param CommentId $commentId
     * @return Comment|null
     */
    public function findById(CommentId $commentId): ?Comment
    {
        $stream = $this->eventStore->getEventsFor($commentId);

        if ($stream->isEmpty()) {
            return null;
        }

        return Comment::reconstitute($stream);
    }
}