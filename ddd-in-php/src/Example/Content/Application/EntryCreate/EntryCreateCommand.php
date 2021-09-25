<?php

declare(strict_types=1);

namespace App\Example\Content\Application\EntryCreate;

use App\Example\Shared\ServiceBus\Command;

class EntryCreateCommand implements Command
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $content;

    public function __construct(int $userId, string $content)
    {
        $this->userId = $userId;
        $this->content = $content;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}