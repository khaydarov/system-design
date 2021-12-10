<?php

declare(strict_types=1);

namespace App\Example\User\Application\UserCreate;

use App\Example\Shared\ServiceBus\CommandHandler;
use App\Example\User\Domain\User;
use App\Example\User\Domain\UserEmail;
use App\Example\User\Domain\UserId;
use App\Example\User\Domain\UserRepository;

class UserCreateCommandHandler implements CommandHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserCreateCommand $command
     */
    public function handle($command)
    {
        $user = new User(
            new UserId(10),
            $command->name,
            new UserEmail($command->email)
        );

        $this->userRepository->save($user);
    }
}