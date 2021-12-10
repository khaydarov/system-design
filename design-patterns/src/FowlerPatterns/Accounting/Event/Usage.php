<?php
declare(strict_types=1);

namespace App\FowlerPatterns\Accounting\Event;

use App\FowlerPatterns\Accounting\Customer\Customer;
use App\FowlerPatterns\Accounting\Entry\EntryType;

/**
 * Class Usage
 * @package App\Accounting\Event
 */
class Usage extends AccountingEvent
{
    /**
     * @var float
     */
    private $amount;

    /**
     * Usage constructor.
     * @param float $amount
     * @param string $type
     * @param \DateTime $whenOccured
     * @param \DateTime $whenNoticed
     * @param Customer $customer
     */
    public function __construct(
        float $amount,
        \DateTime $whenOccured,
        \DateTime $whenNoticed,
        Customer $customer
    ) {
        parent::__construct(EntryType::USAGE, $whenOccured, $whenNoticed, $customer);
        $this->amount = $amount;
    }

    /**
     * @return float
     */
    public function getAmount(): float
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
