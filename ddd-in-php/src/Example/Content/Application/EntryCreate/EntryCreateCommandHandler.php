<?php

declare(strict_types=1);

namespace App\Example\Content\Application\EntryCreate;

use App\Example\Content\Domain\Model\Entry\CreatorId;
use App\Example\Content\Domain\Model\Entry\Entry;
use App\Example\Content\Domain\Model\Entry\EntryId;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Content\Domain\Model\Entry\EntryState;
use App\Example\Shared\ServiceBus\CommandHandler;
use App\Example\Shared\ServiceBus\QueryBus;
use App\Example\User\Application\UserFind\UserFindQuery;

class EntryCreateCommandHandler implements CommandHandler
{
    private $entryRepository;
    private $queryBus;

    public function __construct(EntryRepository $entryRepository, QueryBus $queryBus)
    {
        $this->entryRepository = $entryRepository;
        $this->queryBus = $queryBus;
    }

    /**
     * @param EntryCreateCommand $command
     */
    public function handle($command)
    {
        $query = new UserFindQuery($command->getUserId());
        $user = $this->queryBus->ask($query);

        $entry = new Entry(
            new EntryId(10),
            new CreatorId($command->getUserId()),
            $command->getContent(),
            EntryState::drafted()
        );

        $this->entryRepository->store($entry);
    }
}