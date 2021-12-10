<?php

declare(strict_types=1);

namespace App\Example\Shared\ServiceBus;

interface QueryHandler
{
    public function handle(Query $query);
}