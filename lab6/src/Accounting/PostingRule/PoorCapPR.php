<?php
declare(strict_types=1);

namespace App\Accounting\PostingRule;

use App\Accounting\Event\AccountingEvent;
use App\Accounting\Event\Usage;

class PoorCapPR extends PostingRule
{
    /**
     * @var float
     */
    private $rate;

    /**
     * @var float
     */
    private $limit;

    public function __construct(string $entryType, float $rate, float $limit)
    {
        parent::__construct($entryType);

        $this->rate = $rate;
        $this->limit = $limit;
    }

    /**
     * @param AccountingEvent $event
     * @return float
     */
    protected function calculateAmount(AccountingEvent $event): float
    {
        if ($event instanceof Usage) {
            return $event->getAmount() > $this->limit ?
                $event->getAmount() * $event->getRate() : $event->getAmount() * $this->rate;
        }

        return 1;
    }
}