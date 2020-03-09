<?php
declare(strict_types=1);

namespace App\Accounting\PostingRule;

use App\Accounting\Entry\Entry;
use App\Accounting\Entry\EntryType;
use App\Accounting\Event\AccountingEvent;

abstract class PostingRule
{
    /**
     * @var EntryType
     */
    protected $entryType;

    /**
     * PostingRule constructor.
     * @param EntryType $entryType
     */
    protected function __construct(EntryType $entryType)
    {
        $this->entryType = $entryType;
    }

    /**
     * @param AccountingEvent $event
     */
    public function process(AccountingEvent $event): void
    {
        $this->makeEntry($event, $this->calculateAmount($event));
    }

    /**
     * @param AccountingEvent $event
     * @param int $money
     */
    private function makeEntry(AccountingEvent $event, int $money): void
    {
        $entry = new Entry($money, $event->getWhenNoticed(), $this->entryType);
        $event->getCustomer()->addEntry($entry);
        $event->addResultingEntry($entry);
    }

    /**
     * @param AccountingEvent $event
     * @return mixed
     */
    abstract protected function calculateAmount(AccountingEvent $event): int;
}
