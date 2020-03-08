<?php
declare(strict_types=1);

namespace App\Behavioral\State\Example1;

/**
 * Class StateCreated
 * @package App\Behavioral\State\Example1
 */
class StateCreated implements State
{
    public function proceedToNext(OrderContext $context)
    {
        $context->setState(new StateShipped());
    }

    public function toString(): string
    {
        return 'created';
    }
}