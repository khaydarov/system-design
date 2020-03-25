<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example2;

/**
 * Class PayPalPayment
 * @package App\Behavioral\Strategy\Example2
 */
class PayPalPayment implements PaymentMethod
{
    public function getPaymentForm(Order $order): string
    {
        return '';
    }

    public function validateReturn(Order $order, array $data): bool
    {
        echo 'Done!';

        return true;
    }
}