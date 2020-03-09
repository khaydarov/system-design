<?php
declare(strict_types=1);

namespace App\Accounting\PostingRule;

use App\Accounting\Entry\EntryType;
use App\Accounting\Event\AccountingEvent;
use App\Accounting\Event\Usage;

/**
 * Class MultiplyByRatePR
 * @package App\Accounting
 */
class MultiplyByRatePR extends PostingRule
{
    /**
     * MultiplyByRatePR constructor.
     * @param EntryType $entryType
     */
    public function __construct(EntryType $entryType)
    {
        parent::__construct($entryType);
    }

    /**
     * @param AccountingEvent $event
     * @return int
     */
    protected function calculateAmount(AccountingEvent $event): int
    {
        $amount = 1;
        if ($event instanceof Usage) {
            $amount = $event->getAmount() * $event->getRate();
        }
        return $amount;
    }
}
