<?php

declare(strict_types=1);

namespace App\Example\Content\Application\Entry;

use App\Example\Content\Domain\Model\Entry\Entry;
use App\Example\Content\Domain\Model\Entry\EntryId;
use App\Example\Content\Domain\Model\Entry\EntryRepository;

class EditEntryService
{
    /**
     * @var EntryRepository
     */
    private $entryRepository;

    /**
     * EditEntryService constructor.
     * @param EntryRepository $entryRepository
     */
    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * @param int $id
     * @param string $content
     * @return Entry|null
     */
    public function execute(int $id, string $content): ?Entry
    {
        $entry = $this->entryRepository->findById(EntryId::fromValue($id));
        $entry->changeContent($content);
        $this->entryRepository->store($entry);

        // Must return DTO
        return $entry;
    }
}