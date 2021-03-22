<?php
declare(strict_types=1);

namespace App\Behavioral\Specification;

/**
 * Class OrSpecification
 * @package App\Behavioral\Specification
 */
class OrSpecification implements SpecificationInterface
{
    /**
     * @var SpecificationInterface[]
     */
    private $specifications;

    public function __construct(SpecificationInterface ...$specificationInterfaces)
    {
        $this->specifications = $specificationInterfaces;
    }

    public function isSatisfiedBy(Item $item): bool
    {
        foreach ($this->specifications as $specification) {
            if ($specification->isSatisfiedBy($item)) {
                return true;
            }
        }
        return false;
    }
}