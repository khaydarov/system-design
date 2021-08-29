<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

class Comment extends AggregateRoot
{
    /**
     * @var CommentId
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * Comment constructor.
     * @param CommentId $commentId
     */
    public function __construct(CommentId $commentId)
    {
        $this->id = $commentId;
    }

    /**
     * @param PostId $postId
     * @param string $text
     * @return Comment
     */
    public static function writeNewFrom(PostId $postId, string $text): Comment
    {
        $commentId = CommentId::generate();

        $comment = new static($commentId);
        $comment->recordApplyAndPublishThat(
            new CommentWasCreated($commentId, new \DateTimeImmutable(), $text, $postId)
        );

        return $comment;
    }

    /**
     * @param string $text
     */
    public function changeText(string $text)
    {
        $this->recordApplyAndPublishThat(
            new CommentTextWasChanged(
                $this->id,
                new \DateTimeImmutable(),
                $text,
            )
        );
    }

    /**
     * @param CommentWasCreated $event
     */
    public function applyCommentWasCreated(CommentWasCreated $event)
    {
        $this->text = $event->getText();
    }

    /**
     * @param CommentTextWasChanged $event
     */
    public function applyCommentTextWasChanged(CommentTextWasChanged $event)
    {
        $this->text = $event->getText();
    }

    public static function reconstitute(EventStream $stream): self
    {
        $comment = new static($stream->getAggregateId());

        foreach ($stream->getEvents() as $event) {
            $comment->applyThat($event);
        }

        return $comment;
    }
}