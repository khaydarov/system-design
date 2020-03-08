<?php
declare(strict_types=1);

namespace App\Accounts;

class Account
{
    /**
     * @var AccountData
     */
    protected $account_data;

    /**
     * @var int
     */
    protected $balance = 0;

    /**
     * @var int
     */
    protected $locked = 0;

    /**
     * @param int $id
     * Account constructor.
     */
    public function __construct(int $id = 0)
    {
        if ($id === 0) {
            $this->account_data = new AccountData();
        }
    }

    /**
     * @return AccountData
     */
    public function getAccountData(): AccountData
    {
        return $this->account_data;
    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param int $amount
     */
    public function increase(int $amount): void
    {
        $this->balance += $amount;
    }

    /**
     * @param int $amount
     */
    public function withdraw(int $amount): void
    {
        $this->balance -= $amount;
    }

    /**
     * @param int $amount
     */
    public function lockAmount(int $amount): void
    {
        $this->locked += $amount;
    }

    /**
     * Clears locked amount
     */
    public function unlockAmount(int $amount): void
    {
        $this->locked -= $amount;
    }

    /**
     * @return int
     */
    public function getLockedAmount(): int
    {
        return $this->locked;
    }
}