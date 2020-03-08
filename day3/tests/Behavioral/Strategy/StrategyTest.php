<?php
declare(strict_types=1);

use App\Behavioral\Strategy\Example1\Context;
use App\Behavioral\Strategy\Example1\DateComparator;
use App\Behavioral\Strategy\Example1\IdComparator;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    public function provideIntegers()
    {
        return [
            [
                [
                    ['id' => 2],
                    ['id' => 1],
                    ['id' => 3],
                ],
                ['id' => 1],
            ],
            [
                [
                    ['id' => 3],
                    ['id' => 2],
                    ['id' => 1],
                ],
                ['id' => 1]
            ]
        ];
    }

    public function provideDates()
    {
        return [
            [
                [
                    ['date' => '2014-03-03'],
                    ['date' => '2015-03-02'],
                    ['date' => '2013-03-01']
                ],
                ['date' => '2013-03-01'],
            ],
            [
                [
                    ['date' => '2014-02-03'],
                    ['date' => '2013-02-01'],
                    ['date' => '2015-02-02']
                ],
                ['date' => '2013-02-01'],
            ],
        ];
    }

    /**
     * @dataProvider provideIntegers
     *
     * @param $collection
     * @param $expected
     */
    public function testIdComparator($collection, $expected)
    {
        $obj = new Context(new IdComparator());
        $elements = $obj->executeStrategy($collection);

        $first_element = array_shift($elements);
        $this->assertSame($expected, $first_element);
    }

    /**
     * @dataProvider provideDates
     *
     * @param $collection
     * @param $expected
     */
    public function testDateComparator($collection, $expected)
    {
        $obj = new Context(new DateComparator());
        $elements = $obj->executeStrategy($collection);

        $first_element = array_shift($elements);
        $this->assertSame($expected, $first_element);
    }
}