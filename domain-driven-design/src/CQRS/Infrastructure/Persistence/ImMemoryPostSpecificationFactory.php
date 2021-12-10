<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Persistence;

use App\CQRS\Domain\Service\PostSpecificationFactory;

class ImMemoryPostSpecificationFactory implements PostSpecificationFactory
{
    public function createLatestPost(\DateTimeImmutable $since)
    {
        return new InMemoryLatestPostSpecification($since);
    }
}