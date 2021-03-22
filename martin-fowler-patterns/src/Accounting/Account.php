<?php
declare(strict_types=1);

namespace App\Accounting;

use App\Accounting\Entry\AccountingEntry;
use App\Accounting\Entry\Entry;

class Account
{
    /**
     * @var array
     */
    private $entries = [];

    /**
     * @var string
     */
    private $currency = 'RUB';

    /**
     * Account constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param AccountingEntry $entry
     */
    public function addEntry(AccountingEntry $entry): void
    {
        $this->entries[] = $entry;
    }

    /**
     * @param float $money
     * @param Account $target
     * @param \DateTime $date
     */
    public function withdraw(float $money, Account $target, \DateTime $date): void
    {
        $transaction = new AccountingTransaction($date);
        $transaction->add(-1 * $money, $this);
        $transaction->add($money, $target);
        $transaction->post();
    }

    /**
     * @return float
     */
    public function balance(): float
    {
        $result = 0;
        foreach ($this->entries as $entry) {
            /** @var $entry Entry */
            $result += $entry->getMoney();
        }

        return $result;
    }

    /**
     * @return float
     */
    public function deposits(): float
    {
        $result = 0;
        foreach ($this->entries as $entry) {
            /** @var $entry Entry */
            if ($entry->getMoney() < 0) {
                continue;
            }

            $result += $entry->getMoney();
        }

        return $result;
    }

    /**
     * @return float
     */
    public function withdrawels(): float
    {
        $result = 0;
        foreach ($this->entries as $entry) {
            /** @var $entry Entry */
            if ($entry->getMoney() > 0) {
                continue;
            }

            $result += $entry->getMoney();
        }

        return $result;
    }
}
