<?php

use App\Example\Content\Domain\Model\Comment\CommentRepository;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Content\Infrastructure\Persistence\Model\Comment\PsqlCommentRepository;
use App\Example\Content\Infrastructure\Persistence\Model\Entry\PsqlEntryRepository;
use Aura\Sql\ExtendedPdo;

return [
    ExtendedPdo::class => function() {
        return new ExtendedPdo('pgsql:host=localhost;port=6432;dbname=cqrs');
    },
    EntryRepository::class => function (ExtendedPdo $pdo) {
        return new PsqlEntryRepository($pdo);
    },
    CommentRepository::class => function (ExtendedPdo $pdo) {
        return new PsqlCommentRepository($pdo);
    }
];