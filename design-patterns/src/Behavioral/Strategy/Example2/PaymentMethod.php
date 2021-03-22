<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example2;

/**
 * Interface PaymentMethod
 * @package App\Behavioral\Strategy\Example2
 */
interface PaymentMethod
{
    public function getPaymentForm(Order $order): string;

    public function validateReturn(Order $order, array $data): bool;
}