<?php
declare(strict_types=1);

namespace App\Behavioral\State\Example1;

/**
 * Class StateShipped
 * @package App\Behavioral\State\Example1
 */
class StateShipped implements State
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setState(new StateDone());
    }

    public function toString(): string
    {
        return 'shipped';
    }
}