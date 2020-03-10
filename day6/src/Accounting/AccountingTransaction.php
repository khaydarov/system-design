<?php
declare(strict_types=1);

namespace App\Accounting;

use App\Accounting\Entry\AccountingEntry;
use App\Accounting\Entry\Entry;
use App\Accounting\Entry\EntryType;
use PHPUnit\Util\Exception;

/**
 * Multi-ledged transaction
 *
 * Class AccountingTransaction
 * @package App\Accounting
 */
class AccountingTransaction
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var AccountingEntry[]
     */
    private $entries = [];

    /**
     * @var bool
     */
    private $wasPosted = false;

    public function __construct(\DateTime $date)
    {
        $this->date = $date;
    }

    public function add(float $money, Account $account): void
    {
        if ($this->wasPosted) {
            throw new Exception("");
        }

        $this->entries[] = new AccountingEntry($money, $this->date, $account, $this);
    }

    public function post()
    {
        if (!$this->canPost()) {
            throw new Exception();
        }

        foreach ($this->entries as $entry) {
            $entry->post();
        }

        $this->wasPosted = true;
    }

    /**
     * @return bool
     */
    public function canPost(): bool
    {
        return (int) $this->balance() === 0;
    }

    /**
     * @return float|int
     */
    private function balance(): float
    {
        $result = 0;
        foreach ($this->entries as $entry) {
            $result += $entry->getMoney();
        }

        return $result;
    }
}

/**
 * Class AccountingTransactionTwoLedged
 * @package App\Accounting
 */
class AccountingTransactionTwoLedged
{
    /**
     * @var array
     */
    private $entries = [];

    public function __construct(float $money, Account $from, Account $to, \DateTime $date)
    {
        $fromEntry = new Entry(-1 * $money, $date, EntryType::TRANSFER);
        $from->addEntry($fromEntry);
        $this->entries[] = $fromEntry;

        $toEntry = new Entry($money, $date, EntryType::TRANSFER);
        $to->addEntry($toEntry);
        $this->entries[] = $toEntry;
    }
}
