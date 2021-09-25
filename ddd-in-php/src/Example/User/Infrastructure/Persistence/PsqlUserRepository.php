<?php

declare(strict_types=1);

namespace App\Example\User\Infrastructure\Persistence;

use App\Example\User\Domain\User;
use App\Example\User\Domain\UserEmail;
use App\Example\User\Domain\UserId;
use App\Example\User\Domain\UserRepository;
use Aura\Sql\ExtendedPdo;

class PsqlUserRepository implements UserRepository
{
    private $pdo;

    public function __construct(ExtendedPdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(User $user)
    {
        $this->pdo->fetchOne("INSERT INTO users (name, email) VALUES (:name, :email)", [
            'name' => $user->getName(),
            'email' => $user->getEmail()->getEmail()
        ]);
    }

    public function findById(UserId $id): ?User
    {
        $row = $this->pdo->fetchOne("SELECT * FROM users WHERE id = :id", [
            'id' => $id->getId()
        ]);

        if (empty($row)) {
            return null;
        }

        return new User(new UserId($row['id']), $row['name'], new UserEmail($row['email']));
    }
}