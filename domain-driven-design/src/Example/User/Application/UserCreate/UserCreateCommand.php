<?php

declare(strict_types=1);

namespace App\Example\User\Application\UserCreate;

use App\Example\Shared\ServiceBus\Command;

class UserCreateCommand implements Command
{
    public $name;
    public $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }
}