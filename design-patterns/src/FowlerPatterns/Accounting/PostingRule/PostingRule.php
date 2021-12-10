<?php
declare(strict_types=1);

namespace App\FowlerPatterns\Accounting\PostingRule;

use App\FowlerPatterns\Accounting\Entry\Entry;
use App\FowlerPatterns\Accounting\Entry\EntryType;
use App\FowlerPatterns\Accounting\Event\AccountingEvent;
use App\FowlerPatterns\Accounting\Event\Tax;

abstract class PostingRule
{
    /**
     * @var string
     */
    protected $entryType;

    /**
     * PostingRule constructor.
     * @param string $entryType
     */
    protected function __construct(string $entryType)
    {
        $this->entryType = $entryType;
    }

    /**
     * @param AccountingEvent $event
     */
    public function process(AccountingEvent $event): void
    {
        $this->makeEntry($event, $this->calculateAmount($event));

        if (!$this->isTaxable()) {
            (new Tax($event, $this->calculateAmount($event)))->process();
        }
    }

    /**
     * @param AccountingEvent $event
     * @param float $money
     */
    private function makeEntry(AccountingEvent $event, float $money): void
    {
        $entry = new Entry($money, $event->getWhenNoticed(), $this->entryType);
        $event->getCustomer()->addEntry($entry);
        $event->addResultingEntry($entry);
    }

    /**
     * @return bool
     */
    private function isTaxable()
    {
        return $this->entryType === EntryType::TAX;
    }

    /**
     * @param AccountingEvent $event
     * @return mixed
     */
    abstract protected function calculateAmount(AccountingEvent $event): float;
}
