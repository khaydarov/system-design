<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

class PostDTO
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTimeImmutable
     */
    private $createdAt;

    /**
     * @var bool
     */
    private $published;

    public function __construct(
        int $id,
        string $title,
        string $content,
        \DateTimeImmutable $createdAt,
        bool $published
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->published = $published;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }
}