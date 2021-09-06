<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

use App\Example\Content\Domain\Model\DomainEvent;

class EntryWasCreated implements DomainEvent
{
    /**
     * @var EntryId
     */
    private $id;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTimeImmutable
     */
    private $occurredOn;

    /**
     * EntryWasCreated constructor.
     * @param EntryId $id
     * @param string $content
     * @param \DateTimeImmutable $occurredOn
     */
    public function __construct(EntryId $id, string $content, \DateTimeImmutable $occurredOn)
    {
        $this->id = $id;
        $this->content = $content;
        $this->occurredOn = $occurredOn;
    }

    /**
     * @return EntryId
     */
    public function getId(): EntryId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
}