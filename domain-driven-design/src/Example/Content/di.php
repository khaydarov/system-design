<?php

use App\Example\Content\Domain\Model\Comment\CommentRepository;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Content\Infrastructure\Persistence\Model\Comment\PsqlCommentRepository;
use App\Example\Content\Infrastructure\Persistence\Model\Entry\PsqlEntryRepository;
use App\Example\Content\Infrastructure\Projection\EntryWasCreatedProjection;
use App\Example\Content\Infrastructure\Projection\Projector;
use Aura\Sql\ExtendedPdo;
use DI\Container;

return [
    Projector::class => function () {
        return new App\Example\Content\Infrastructure\Projection\Projector([
            new EntryWasCreatedProjection(),
        ]);
    },
    ExtendedPdo::class => function() {
        return new ExtendedPdo('pgsql:host=localhost;port=6432;dbname=cqrs');
    },
    EntryRepository::class => function (ExtendedPdo $pdo, Projector $projector) {
        return new PsqlEntryRepository($pdo, $projector);
    },
    CommentRepository::class => function (ExtendedPdo $pdo) {
        return new PsqlCommentRepository($pdo);
    },
];