<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Class PostContentWasChanged
 *
 * @package App\CQRS\Domain
 */
class PostContentWasChanged extends DomainEvent
{
    /**
     * @var PostId
     */
    private $postId;

    /**
     * @var string
     */
    private $content;

    /**
     * PostContentWasChanged constructor.
     *
     * @param PostId $postId
     * @param \DateTimeImmutable $occurredOn
     * @param string $content
     */
    public function __construct(PostId $postId, \DateTimeImmutable $occurredOn, string $content)
    {
        parent::__construct($occurredOn);

        $this->postId = $postId;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getData(): array
    {
        return [
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
    public function getContent(): string
    {
        return $this->content;
    }

    public function getAggregateId()
    {
        return $this->getPostId();
    }
}