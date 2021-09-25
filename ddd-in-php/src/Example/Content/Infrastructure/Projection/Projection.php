<?php

declare(strict_types=1);

namespace App\Example\Content\Infrastructure\Projection;

interface Projection
{
    public function listen(): string;
    public function handle($event);
}