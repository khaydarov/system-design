<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Class PostWasPublished
 * @package App\CQRS\Domain
 */
class PostWasPublished extends DomainEvent
{
    /**
     * @var PostId
     */
    private $postId;

    public function __construct(\DateTimeImmutable $occurredOn, PostId $postId)
    {
        parent::__construct($occurredOn);
        $this->postId = $postId;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }

    /**
     * @return PostId
     */
    public function getPostId(): PostId
    {
        return $this->postId;
    }

    /**
     * @return PostId
     */
    public function getAggregateId()
    {
        return $this->getPostId();
    }
}