<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example1;

/**
 * Class DateComparator
 * @package App\Behavioral\Strategy
 */
class DateComparator implements ComparatorInterface
{
    public function compare($a, $b): int
    {
        $date_a = new \DateTime($a['date']);
        $date_b = new \DateTime($b['date']);

        return $date_a <=> $date_b;
    }
}