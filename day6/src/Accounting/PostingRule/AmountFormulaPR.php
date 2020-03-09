<?php
declare(strict_types=1);

namespace App\Accounting\PostingRule;

use App\Accounting\Entry\EntryType;
use App\Accounting\Event\AccountingEvent;
use App\Accounting\Event\Monetary;
use App\Accounting\Event\Usage;

class AmountFormulaPR extends PostingRule
{
    /**
     * @var float
     */
    private $multiplier;

    /**
     * @var int
     */
    private int $fixedFee;

    public function __construct(float $multiplier, int $fixedFee, EntryType $entryType)
    {
        parent::__construct($entryType);

        $this->multiplier = $multiplier;
        $this->fixedFee = $fixedFee;
    }

    /**
     * @param AccountingEvent $event
     * @return int
     */
    protected function calculateAmount(AccountingEvent $event): float
    {
        $amount = 1;
        if ($event instanceof Monetary) {
            $amount = $event->getAmount() * $this->multiplier + $this->fixedFee;
        }

        return $amount;
    }
}
