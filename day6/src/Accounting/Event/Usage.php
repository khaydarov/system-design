<?php
declare(strict_types=1);

namespace App\Accounting\Event;

use App\Accounting\Customer\Customer;

/**
 * Class Usage
 * @package App\Accounting\Event
 */
class Usage extends AccountingEvent
{
    /**
     * @var int
     */
    private int $amount;

    /**
     * Usage constructor.
     * @param int $amount
     * @param \DateTime $whenOccured
     * @param \DateTime $whenNoticed
     * @param Customer $customer
     */
    public function __construct(
        int $amount,
        \DateTime $whenOccured,
        \DateTime $whenNoticed,
        Customer $customer
    ) {
        parent::__construct(EventType::getUsageType(), $whenOccured, $whenNoticed, $customer);
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->getCustomer()->getServiceAgreement()->getRate();
    }
}
