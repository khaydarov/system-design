<?php
declare(strict_types=1);

namespace App\Accounting\Event;

class Tax extends Monetary
{
    private $base;

    public function __construct(
        AccountingEvent $base,
        float $taxableAmount
    ) {
        parent::__construct(
            $taxableAmount,
            EventType::TAX,
            $base->getWhenOccured(),
            $base->getWhenNoticed(),
            $base->getCustomer()
        );

        $this->base = $base;
        $this->base->friendAddSecondaryEvent($this);
    }
}