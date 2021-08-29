<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

interface DomainEventSubscriber
{
    public function handle($event): void;
    public function isSubscribedTo($event): bool;
}