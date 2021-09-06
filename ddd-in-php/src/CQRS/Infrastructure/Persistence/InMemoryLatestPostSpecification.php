<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Persistence;

/**
 * Class InMemoryLatestPostSpecification
 * @package App\CQRS\Infrastructure\Persistence
 */
class InMemoryLatestPostSpecification
{
    /**
     * @var \DateTimeImmutable
     */
    private $since;

    /**
     * InMemoryLatestPostSpecification constructor.
     * @param \DateTimeImmutable $since
     */
    public function __construct(\DateTimeImmutable $since)
    {
        $this->since = $since;
    }
}