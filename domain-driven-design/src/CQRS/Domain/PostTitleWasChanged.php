<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Class PostTitleWasChanged
 * @package App\CQRS\Domain
 */
class PostTitleWasChanged extends DomainEvent
{
    /**
     * @var PostId
     */
    private $postId;

    /**
     * @var string
     */
    private $title;

    public function __construct(PostId $postId, \DateTimeImmutable $occurredOn, string $title)
    {
        parent::__construct($occurredOn);

        $this->postId = $postId;
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getData(): array
    {
        return [
            'title' => $this->title
        ];
    }

    /**
     * @return PostId
     */
    public function getPostId(): PostId
    {
        return $this->postId;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAggregateId()
    {
        return $this->getPostId();
    }
}