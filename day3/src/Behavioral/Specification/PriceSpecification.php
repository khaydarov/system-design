<?php
declare(strict_types=1);

namespace App\Behavioral\Specification;

/**
 * Class PriceSpecification
 * @package App\Behavioral\Specification
 */
class PriceSpecification implements SpecificationInterface
{
    /**
     * @var float|null
     */
    private $max_price;

    /**
     * @var float|null
     */
    private $min_price;

    /**
     * PriceSpecification constructor.
     * @param $min_price
     * @param $max_price
     */
    public function __construct($min_price, $max_price)
    {
        $this->min_price = $min_price;
        $this->max_price = $max_price;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function isSatisfiedBy(Item $item): bool
    {
        if ($this->max_price !== null && $item->getPrice() > $this->max_price) {
            return false;
        }

        if ($this->min_price !== null && $item->getPrice() < $this->min_price) {
            return false;
        }

        return true;
    }
}