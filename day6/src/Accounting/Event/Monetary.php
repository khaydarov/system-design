<?php
declare(strict_types=1);

namespace App\Accounting\Event;

use App\Accounting\Customer\Customer;

class Monetary extends AccountingEvent
{
    private int $amount;

    public function __construct(
        int $amount,
        EventType $type,
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
    public function getAmount(): int
    {
        return $this->amount;
    }
}