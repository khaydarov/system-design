<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

use App\Example\Content\Domain\Model\AggregateRoot;

class Entry extends AggregateRoot
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
     * @var EntryState
     */
    private $state;

    public function __construct(EntryId $id, string $content, EntryState $state)
    {
        $this->id = $id;
        $this->content = $content;
        $this->state = $state;

        $this->recordEvent(
            new EntryWasCreated($id, $content, new \DateTimeImmutable())
        );
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

    /**
     * @return EntryState
     */
    public function getState(): EntryState
    {
        return $this->state;
    }

    /**
     * @param string $newContent
     */
    public function changeContent(string $newContent)
    {
        $this->content = $newContent;

        $this->recordEvent(
            new EntryContentWasChanged($this->id, $newContent, new \DateTimeImmutable())
        );
    }

    public function publish()
    {
        $this->state = EntryState::published();

        $this->recordEvent(
            new EntryWasPublished($this->id, new \DateTimeImmutable())
        );
    }

    /**
     * @param EntryId $entryId
     * @param string $content
     *
     * @return static
     */
    public static function fromValues(EntryId $entryId, string $content, EntryState $state): self
    {
        return new Entry($entryId, $content, $state);
    }
}