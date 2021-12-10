<?php
declare(strict_types=1);

namespace App\FowlerPatterns\Accounting\PostingRule;

use App\FowlerPatterns\Accounting\Entry\EntryType;
use App\FowlerPatterns\Accounting\Event\AccountingEvent;
use App\FowlerPatterns\Accounting\Event\Monetary;
use App\FowlerPatterns\Accounting\Event\Usage;

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

    public function __construct(float $multiplier, int $fixedFee, string $entryType)
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
