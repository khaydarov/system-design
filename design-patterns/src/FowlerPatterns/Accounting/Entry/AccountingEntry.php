<?php
declare(strict_types=1);

namespace App\FowlerPatterns\Accounting\Entry;

use App\Accounting\Account;
use App\Accounting\AccountingTransaction;

class AccountingEntry
{
    /**
     * @var float
     */
    private $money;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var Account
     */
    private $account;

    /**
     * @var AccountingTransaction
     */
    private $transaction;

    /**
     * Entry constructor.
     * @param float $money
     * @param \DateTime $date
     * @param EntryType $type
     */
    public function __construct(
        float $money,
        \DateTime $date,
        Account $account,
        AccountingTransaction $transaction
    ) {
        $this->money = $money;
        $this->date = $date;
        $this->account = $account;
        $this->transaction = $transaction;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return Account
     */
    public function getAccount(): Account
    {
        return $this->account;
    }

    /**
     * @return AccountingTransaction
     */
    public function getTransaction(): AccountingTransaction
    {
        return $this->transaction;
    }

    /**
     * Saving to the database
     */
    public function post(): void
    {
        $this->account->addEntry($this);
    }
}
