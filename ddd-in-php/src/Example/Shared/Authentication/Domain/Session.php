<?php

declare(strict_types=1);

namespace App\Example\Shared\Authentication;

class Session
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $token;

    public function __construct(int $userId, string $token)
    {
        $this->userId = $userId;
        $this->token = $token;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}