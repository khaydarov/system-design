<?php
declare(strict_types=1);

namespace App\Solid\Example1;

/**
 * Class SumCalculatorOutputter
 * @package App\Solid
 */
class SumCalculatorOutputter
{
    /**
     * @var AreaCalculator
     */
    private $areaCalculator;

    /**
     * SumCalculatorOutputter constructor.
     *
     * @param AreaCalculator $areaCalculator
     */
    public function __construct(AreaCalculator $areaCalculator)
    {
        $this->areaCalculator = $areaCalculator;
    }

    public function JSON()
    {
        // return as JSON
    }

    public function HAML()
    {
        // return as HAML
    }

    public function HTML()
    {
        // return as HTML
    }

    public function JADE()
    {
        // return as JADE
    }
}
