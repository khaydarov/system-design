<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Entry;

/**
 * Interface EntryRepository
 * @package App\Example\Content\Domain\Model\Entry
 */
interface EntryRepository
{
    /**
     * @return EntryId
     */
    public function nextIdentity(): EntryId;

    /**
     * @param Entry $entry
     * @return mixed
     */
    public function store(Entry &$entry);

    /**
     * @param EntryId $entryId
     * @return Entry|null
     */
    public function findById(EntryId $entryId): ?Entry;

    /**
     * @param CreatorId $creatorId
     *
     * @return mixed
     */
    public function findByCreatorId(CreatorId $creatorId);
}