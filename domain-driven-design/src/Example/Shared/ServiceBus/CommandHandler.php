<?php

declare(strict_types=1);

namespace App\Example\Shared\ServiceBus;

interface CommandHandler
{
    public function handle($command);
}