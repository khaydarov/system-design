<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Class CommentTextWasChanged
 * @package App\CQRS\Domain
 */
class CommentTextWasChanged extends DomainEvent
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
     * CommentTextWasChanged constructor.
     *
     * @param CommentId $commentId
     * @param \DateTimeImmutable $occurredOn
     * @param string $text
     */
    public function __construct(CommentId $commentId, \DateTimeImmutable $occurredOn, string $text)
    {
        parent::__construct($occurredOn);

        $this->commentId = $commentId;
        $this->text = $text;
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
     * @return string[]
     */
    public function getData(): array
    {
        return [
            'commentId' => $this->commentId,
            'text' => $this->text,
        ];
    }

    public function getAggregateId()
    {
        return $this->getCommentId();
    }
}