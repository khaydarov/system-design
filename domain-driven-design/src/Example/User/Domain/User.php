<?php

declare(strict_types=1);

namespace App\Example\User\Domain;

use App\Example\Shared\Domain\AggregateRoot;

class User extends AggregateRoot
{
    /**
     * @var UserId
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var UserEmail
     */
    private $email;

    public function __construct(UserId $id, string $name, UserEmail $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return UserEmail
     */
    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    /**
     * @param string $newName
     */
    public function changeName(string $newName)
    {
        $this->name = $newName;
    }
}