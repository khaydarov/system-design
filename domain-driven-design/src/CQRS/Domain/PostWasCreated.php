<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Class PostWasCreated
 * @package App\CQRS\Domain
 */
class PostWasCreated extends DomainEvent
{
    /**
     * @var PostId
     */
    private $postId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * PostWasCreated constructor.
     * @param PostId $postId
     * @param string $title
     * @param string $content
     */
    public function __construct(PostId $postId, \DateTimeImmutable $occurredOn, string $title, string $content)
    {
        parent::__construct($occurredOn);

        $this->postId = $postId;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content
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

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    public function getAggregateId()
    {
        return $this->getPostId();
    }
}