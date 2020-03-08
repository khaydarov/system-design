<?php
declare(strict_types=1);

namespace App\Behavioral\State\Example1;

/**
 * Class StateDone
 * @package App\Behavioral\State\Example1
 */
class StateDone implements State
{
    public function proceedToNext(OrderContext $context)
    {
        // do nothing
    }

    public function toString(): string
    {
        return 'done';
    }
}