<?php

declare(strict_types=1);

namespace LibraryManagementSystem\Account;

class Account
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Person
     */
    private $person;

    public function __construct(int $id, Person $person)
    {
        $this->id = $id;
        $this->person = $person;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }
}