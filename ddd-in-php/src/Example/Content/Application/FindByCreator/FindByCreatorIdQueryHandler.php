<?php

declare(strict_types=1);

namespace App\Example\Content\Application\FindByCreator;

use App\Example\Content\Domain\Model\Entry\CreatorId;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Shared\ServiceBus\Query;
use App\Example\Shared\ServiceBus\QueryHandler;

class FindByCreatorIdQueryHandler implements QueryHandler
{
    /**
     * @var EntryRepository
     */
    private $entryRepository;

    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * @param FindByCreatorIdQuery $query
     */
    public function handle(Query $query)
    {
        $creatorId = $query->getCreatorId();
        $entries = $this->entryRepository->findByCreatorId(new CreatorId($creatorId));
    }
}