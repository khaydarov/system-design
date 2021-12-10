<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Class CommentWasCreated
 * @package App\CQRS\Domain
 */
class CommentWasCreated extends DomainEvent
{
    /**
     * @var CommentId
     */
    private $commentId;

    /**
     * @var string
     */
    private $text;

    /**
     * @var PostId
     */
    private $postId;

    /**
     * CommentWasCreated constructor.
     * @param CommentId $commentId
     * @param \DateTimeImmutable $occurredOn
     * @param string $content
     */
    public function __construct(CommentId $commentId, \DateTimeImmutable $occurredOn, string $text, PostId $postId)
    {
        parent::__construct($occurredOn);

        $this->commentId = $commentId;
        $this->text = $text;
        $this->postId = $postId;
    }

    /**
     * @return CommentId
     */
    public function getCommentId(): CommentId
    {
        return $this->commentId;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return PostId
     */
    public function getPostId(): PostId
    {
        return $this->postId;
    }

    /**
     * @return string[]
     */
    public function getData(): array
    {
        return [
            'text' => $this->text,
            'postId' => $this->postId
        ];
    }

    public function getAggregateId()
    {
        return $this->getCommentId();
    }
}