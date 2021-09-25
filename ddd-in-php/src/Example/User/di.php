<?php

use App\Example\User\Domain\UserRepository;
use App\Example\User\Infrastructure\Persistence\PsqlUserRepository;
use Aura\Sql\ExtendedPdo;

return [
    UserRepository::class => function (ExtendedPdo $pdo) {
        return new PsqlUserRepository($pdo);
    }
];