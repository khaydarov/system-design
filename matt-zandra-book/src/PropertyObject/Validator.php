<?php
declare(strict_types=1);

namespace App\PropertyObject;

/**
 * Interface Validator
 * @package App\PropertyObject
 */
interface Validator
{
    public function validate(array $data): bool;
}