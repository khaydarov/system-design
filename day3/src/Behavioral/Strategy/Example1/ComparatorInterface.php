<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example1;

/**
 * Interface ComparatorInterface
 * @package App\Behavioral\Strategy
 */
interface ComparatorInterface
{
    public function compare($a, $b): int;
}