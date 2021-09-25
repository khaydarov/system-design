<?php

declare(strict_types=1);

namespace App\Example\User\Domain;

use App\Example\Shared\Domain\ValueObject;

class UserId extends ValueObject
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}