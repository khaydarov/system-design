<?php

declare(strict_types=1);

namespace App\Example\User\Domain;

interface UserRepository
{
    public function save(User $user);
    public function findById(UserId $id): ?User;
}