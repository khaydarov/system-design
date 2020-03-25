<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example2;

/**
 * Class CreditCardPayment
 * @package App\Behavioral\Strategy\Example2
 */
class CreditCardPayment implements PaymentMethod
{
    static private $store_secret_key = "swordfish";

    public function getPaymentForm(Order $order): string
    {
        return '';
    }

    public function validateReturn(Order $order, array $data): bool
    {
        echo "Done!";

        return true;
    }
}