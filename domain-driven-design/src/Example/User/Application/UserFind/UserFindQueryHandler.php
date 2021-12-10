<?php

declare(strict_types=1);

namespace App\Example\User\Application\UserFind;

use App\Example\Shared\ServiceBus\Query;
use App\Example\Shared\ServiceBus\QueryHandler;
use App\Example\User\Domain\UserId;
use App\Example\User\Domain\UserRepository;

class UserFindQueryHandler implements QueryHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserFindQuery $query
     *
     * @return array|null
     */
    public function handle(Query $query)
    {
        $user = $this->userRepository->findById(new UserId($query->getId()));

        if ($user === null) {
            return null;
        }

        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ];
    }
}