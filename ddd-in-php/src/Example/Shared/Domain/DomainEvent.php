<?php

declare(strict_types=1);

namespace App\Example\Shared\Domain;

interface DomainEvent
{
    public function occurredOn(): \DateTimeImmutable;
}