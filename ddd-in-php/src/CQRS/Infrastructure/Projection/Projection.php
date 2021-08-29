<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Projection;

/**
 * Interface Projection
 * @package App\CQRS
 */
interface Projection
{
    public function listensTo();
    public function project($event);
}