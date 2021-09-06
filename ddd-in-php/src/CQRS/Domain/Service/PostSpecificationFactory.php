<?php

declare(strict_types=1);

namespace App\CQRS\Domain\Service;

interface PostSpecificationFactory
{
    public function createLatestPost(\DateTimeImmutable $since);
}