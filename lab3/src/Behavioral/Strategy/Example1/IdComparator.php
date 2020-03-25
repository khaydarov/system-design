<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example1;

/**
 * Class IdComparator
 * @package App\Behavioral\Strategy
 */
class IdComparator implements ComparatorInterface
{
    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a['id'] <=> $b['id'];
    }
}