<?php
declare(strict_types=1);

namespace App\Behavioral\Specification;

/**
 * Interface SpecificationInterface
 * @package App\Behavioral\Specification
 */
interface SpecificationInterface
{
    public function isSatisfiedBy(Item $item): bool;
}