<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model;

interface DomainEvent
{
    public function occurredOn(): \DateTimeImmutable;
}