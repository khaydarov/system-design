<?php

use App\Example\Content\Domain\Model\Comment\CommentRepository;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Content\Infrastructure\Persistence\Model\Comment\PsqlCommentRepository;
use App\Example\Content\Infrastructure\Persistence\Model\Entry\PsqlEntryRepository;
use App\Example\Content\Infrastructure\Projection\EntryWasCreatedProjection;
use App\Example\Content\Infrastructure\Projection\Projector;
use App\Example\Shared\ServiceBus\CommandBus;
use App\Example\Shared\ServiceBus\QueryBus;
use Aura\Sql\ExtendedPdo;
use DI\Container;

return [
    CommandBus::class => function (Container $container) {
        return new CommandBus($container);
    },
    QueryBus::class => function (Container $container) {
        return new QueryBus($container);
    },
];