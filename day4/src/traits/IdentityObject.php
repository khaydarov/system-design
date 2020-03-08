<?php
declare(strict_types=1);

namespace App\traits;

/**
 * Interface IdentityObject
 */
interface IdentityObject
{
    public function generateId(): string;
}