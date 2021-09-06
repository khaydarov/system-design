<?php

declare(strict_types=1);

namespace App\Example\Content\Application\Entry;

use App\Example\Content\Domain\Model\Entry\Entry;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Content\Domain\Model\Entry\EntryState;

class AddEntryService
{
    /**
     * @var EntryRepository
     */
    private $entryRepository;

    /**
     * CreateEntry constructor.
     * @param EntryRepository $entryRepository
     */
    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * @param string $content
     * @return Entry
     */
    public function execute(string $content): Entry
    {
        $entry = new Entry(
            $this->entryRepository->nextIdentity(),
            $content,
            EntryState::drafted()
        );

        $this->entryRepository->store($entry);

        // Must return DTO
        return $entry;
    }
}