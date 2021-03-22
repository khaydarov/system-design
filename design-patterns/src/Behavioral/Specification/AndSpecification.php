<?php
declare(strict_types=1);

namespace App\Behavioral\Specification;

/**
 * Class AndSpecification
 * @package App\Behavioral\Specification
 */
class AndSpecification implements SpecificationInterface
{
    /**
     * @var SpecificationInterface[]
     */
    private $specifications;

    /**
     * AndSpecification constructor.
     * @param SpecificationInterface ...$specificationInterfaces
     */
    public function __construct(SpecificationInterface ...$specificationInterfaces)
    {
        $this->specifications = $specificationInterfaces;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function isSatisfiedBy(Item $item): bool
    {
        foreach($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($item)) {
                return false;
            }
        }

        return true;
    }
}