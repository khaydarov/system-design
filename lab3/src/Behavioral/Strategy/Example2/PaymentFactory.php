<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example2;

/**
 * Class PaymentFactory
 * @package App\Behavioral\Strategy\Example2
 */
class PaymentFactory
{
    public static function getPaymentMethod(string $id): PaymentMethod
    {
        switch ($id) {
            case 'cc':
                return new CreditCardPayment();
            case 'paypal':
                return new PayPalPayment();
            default:
                throw new \Exception('Unknown payment method');
        }
    }
}