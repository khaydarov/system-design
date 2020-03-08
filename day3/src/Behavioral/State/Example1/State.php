<?php
declare(strict_types=1);

namespace App\Behavioral\State\Example1;

/**
 * Interface State
 * @package App\Behavioral\State\Example1
 */
interface State
{
    public function proceedToNext(OrderContext $context);

    public function toString(): string;
}