<?php

declare(strict_types=1);

namespace App\Example\Content\Infrastructure\Persistence\Model\Entry;

use App\Example\Content\Domain\Model\Entry\CreatorId;
use App\Example\Content\Domain\Model\Entry\Entry;
use App\Example\Content\Domain\Model\Entry\EntryId;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Content\Domain\Model\Entry\EntryState;
use App\Example\Content\Infrastructure\Projection\Projector;
use Aura\Sql\ExtendedPdo;

class PsqlEntryRepository implements EntryRepository
{
    /**
     * @var ExtendedPdo
     */
    private $pdo;

    /**
     * @var Projector
     */
    private $projector;

    /**
     * PsqlEntryRepository constructor.
     * @param ExtendedPdo $pdo
     */
    public function __construct(ExtendedPdo $pdo, Projector $projector)
    {
        $this->pdo = $pdo;
        $this->projector = $projector;
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

        $this->pdo->fetchOne(
            "INSERT INTO users_entries (user_id, entry_id) VALUES (:user_id, :entry_id)",
            [
                'user_id' => $entry->getCreatorId()->getId(),
                'entry_id' => $data['id']
            ]
        );

        $entry = new Entry(
            EntryId::fromValue($data['id']),
            $entry->getCreatorId(),
            $data['content'],
            $entry->getState(),
        );

        $events = $entry->getRecordedEvents();
        foreach ($events as $event) {
            $this->projector->project($event);
        }
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

        return new Entry(
            EntryId::fromValue($data['id']),
            new CreatorId(1),
            $data['content'],
            new EntryState($data['state'])
        );
    }

    public function findByCreatorId(CreatorId $creatorId)
    {
        $rows = $this->pdo->fetchAll(
            "SELECT * FROM entry e JOIN users_entries ee ON e.id = ee.user_id WHERE e.id = :id",
            [
                'id' => $creatorId->getId()
            ]
        );

        if (empty($rows)) {
            return [];
        }

        $entries = [];
        foreach ($rows as $row) {
            $entries[] = new Entry(
                EntryId::fromValue($row['id']),
                new CreatorId($row['user_id']),
                $row['content'],
                new EntryState($row['state'])
            );
        }

        return $entries;
    }
}