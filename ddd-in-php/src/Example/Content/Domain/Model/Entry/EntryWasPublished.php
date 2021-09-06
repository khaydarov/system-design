<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

use App\Example\Content\Domain\Model\DomainEvent;

class EntryWasPublished implements DomainEvent
{
    /**
     * @var EntryId
     */
    private $entryId;

    /**
     * @var \DateTimeImmutable
     */
    private $occurredOn;

    /**
     * EntryWasPublished constructor.
     * @param EntryId $entryId
     */
    public function __construct(EntryId $entryId, \DateTimeImmutable $occurredOn)
    {
        $this->entryId = $entryId;
        $this->occurredOn = $occurredOn;
    }

    /**
     * @return EntryId
     */
    public function getEntryId(): EntryId
    {
        return $this->entryId;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function occurredOn(): \DateTimeImmutable
    {
        return $this->occurredOn;
    }
}