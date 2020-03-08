<?php
declare(strict_types=1);

namespace App\traits;

/**
 * Trait IdentityTrait
 */
trait IdentityTrait
{
    public function generateId(): string
    {
        return uniqid('-', true);
    }
}