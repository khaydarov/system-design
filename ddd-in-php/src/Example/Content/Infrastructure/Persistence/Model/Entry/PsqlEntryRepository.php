<?php

declare(strict_types=1);

namespace App\Example\Content\Infrastructure\Persistence\Model\Entry;

use App\Example\Content\Domain\Model\Entry\Entry;
use App\Example\Content\Domain\Model\Entry\EntryId;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use Aura\Sql\ExtendedPdo;

class PsqlEntryRepository implements EntryRepository
{
    /**
     * @var ExtendedPdo
     */
    private $pdo;

    /**
     * PsqlEntryRepository constructor.
     * @param ExtendedPdo $pdo
     */
    public function __construct(ExtendedPdo $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return EntryId
     */
    public function nextIdentity(): EntryId
    {
        return new EntryId(10);
    }

    /**
     * @param Entry $entry
     */
    public function store(Entry &$entry): void
    {
        $data = $this->pdo->fetchOne(
            "INSERT INTO entry (content, state) VALUES (:content, :state) RETURNING *",
            [
                'content' => $entry->getContent(),
                'state' => $entry->getState()->getValue()
            ]
        );

        $entry = Entry::fromValues(
            EntryId::fromValue($data['id']),
            $data['content'],
            $data['state']
        );
    }

    public function findById(EntryId $entryId): ?Entry
    {
        $data = $this->pdo->fetchOne(
            "SELECT * FROM entry WHERE id = :id",
            [
                'id' => $entryId->getValue()
            ]
        );

        if (empty($data)) {
            return null;
        }

        return Entry::fromValues(
            EntryId::fromValue($data['id']),
            $data['content'],
            $data['state']
        );
    }
}