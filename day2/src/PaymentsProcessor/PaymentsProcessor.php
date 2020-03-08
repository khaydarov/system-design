<?php
declare(strict_types=1);

namespace App\PaymentsProcessor;

use App\Accounts\Account;
use App\Exceptions\PaymentException;
use App\Payments\Payment;

class PaymentsProcessor
{
    /**
     * @var array
     */
    protected $payment_orders = [];

    /**
     * @param Account $creator
     * @param Account $destination
     * @param int $amount
     * @param string $currency
     * @return Payment|null
     * @throws PaymentException
     */
    public function createPaymentOrder(Account $creator, Account $destination, int $amount, string $currency = 'RUB'): ?Payment
    {
        if ($creator->getBalance() - $creator->getLockedAmount() < $amount) {
            throw new PaymentException('You dont have enough money');
        }

        $payment_order = new Payment();
        $payment_order
            ->setCreator($creator)
            ->setDestination($destination)
            ->setAmount($amount)
            ->setCurrency($currency)
            ->setState(Payment::STATE_WAIT);

        $this->payment_orders[] = $payment_order;

        $creator->lockAmount($amount);
        return $payment_order;
    }

    /**
     * @param Payment $payment_order
     * @return PaymentsProcessor
     * @throws PaymentException
     */
    public function acceptPaymentOrder(Payment $payment_order): self
    {
        if ($payment_order->isState(Payment::STATE_REJECTED) || $payment_order->isState(Payment::STATE_ACCEPTED)) {
            throw new PaymentException('Payment order is refused or already accepted');
        }

        /**
         * Withdraw and unlock amount
         */
        $payment_order->getCreator()->withdraw($payment_order->getAmount());
        $payment_order->getCreator()->unlockAmount($payment_order->getAmount());

        /**
         * Increase destination balance
         */
        $payment_order->getDestination()->increase($payment_order->getAmount());

        /**
         * set accepted payment order
         */
        $payment_order->setState(Payment::STATE_ACCEPTED);

        return $this;
    }

    /**
     * @param Payment $payment_order
     * @return PaymentsProcessor
     * @throws PaymentException
     */
    public function approvePaymentOrder(Payment $payment_order): self
    {
        if ($payment_order->isState(Payment::STATE_REJECTED) || $payment_order->isState(Payment::STATE_ACCEPTED)) {
            throw new PaymentException('Payment order is refused or already accepted');
        }

        $payment_order->setState(Payment::STATE_APPROVED);
        return $this;
    }

    /**
     * @param Payment $payment_order
     */
    public function rejectPaymentOrder(Payment $payment_order): void
    {
        $payment_order->getCreator()->unlockAmount($payment_order->getAmount());
        $payment_order->setState(Payment::STATE_REJECTED);
    }

}