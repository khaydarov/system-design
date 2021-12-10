<?php

declare(strict_types=1);

namespace App\EventSourcing\Domain;

use App\CQRS\Domain\Post;

interface EventSourceAggregateRoot
{
    public static function reconstitute(EventStream $eventStream): Post;
}