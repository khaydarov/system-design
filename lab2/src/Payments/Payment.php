<?php
declare(strict_types=1);

namespace App\Payments;

use App\Accounts\Account;

class Payment
{
    const STATE_WAIT = 10;
    const STATE_CANCELED = 20;
    const STATE_REJECTED = 50;
    const STATE_APPROVED = 80;
    const STATE_ACCEPTED = 100;

    /**
     * @var string
     */
    protected $transaction_id;

    /**
     * @var Account
     */
    protected $creator;

    /**
     * @var Account
     */
    protected $destination;

    /**
     * @var \DateTime
     */
    protected $data_created;

    /**
     * @var int
     */
    protected $state;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var string
     */
    protected $currency;

    /**
     * Payments constructor.
     */
    public function __construct()
    {
        $this->transaction_id = uniqid('', false);
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return Account
     */
    public function getCreator(): Account
    {
        return $this->creator;
    }

    /**
     * @return Account
     */
    public function getDestination(): Account
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param Account $account
     * @return Payment
     */
    public function setCreator(Account $account): self
    {
        $this->creator = $account;
        return $this;
    }

    /**
     * @param Account $account
     * @return Payment
     */
    public function setDestination(Account $account): self
    {
        $this->destination = $account;
        return $this;
    }

    /**
     * @param int $amount
     * @return Payment
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param string $currency
     * @return Payment
     */
    public function setCurrency(string $currency = 'RUB'): self
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @param int $state
     */
    public function setState(int $state): void
    {
        $this->state = $state;
    }

    /**
     * @param int $state
     * @return bool
     */
    public function isState(int $state): bool
    {
        return $this->state === $state;
    }
}