<?php

declare(strict_types=1);

namespace App\Example\Content\Application\FindByCreator;

use App\Example\Shared\ServiceBus\Query;

class FindByCreatorIdQuery implements Query
{
    private $creatorId;

    public function __construct(int $creatorId)
    {
        $this->creatorId = $creatorId;
    }

    /**
     * @return int
     */
    public function getCreatorId(): int
    {
        return $this->creatorId;
    }
}