<?php
declare(strict_types=1);

namespace App\FowlerPatterns\Accounting\Event;

use App\FowlerPatterns\Accounting\Customer\Customer;

class Monetary extends AccountingEvent
{
    private float $amount;

    public function __construct(
        float $amount,
        string $type,
        \DateTime $whenOccured,
        \DateTime $whenNoticed,
        Customer $customer
    ) {
        parent::__construct($type, $whenOccured, $whenNoticed, $customer);
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getAmount(): float
    {
        return $this->amount;
    }
}