<?php

declare(strict_types=1);

namespace App\PatkingLot;

class Account
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @var AccountStatus
     */
    private $status;

    public function __construct(string $name, string $password, AccountStatus $accountStatus)
    {
        $this->name = $name;
        $this->password = $password;
        $this->status = $accountStatus;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return AccountStatus
     */
    public function getStatus(): AccountStatus
    {
        return $this->status;
    }
}