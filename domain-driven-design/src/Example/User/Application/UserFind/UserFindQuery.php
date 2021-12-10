<?php

declare(strict_types=1);

namespace App\Example\User\Application\UserFind;

use App\Example\Shared\ServiceBus\Query;

class UserFindQuery implements Query
{
    /**
     * @var int
     */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }
}