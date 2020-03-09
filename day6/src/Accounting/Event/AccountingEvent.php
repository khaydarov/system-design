<?php
declare(strict_types=1);

namespace App\Accounting\Event;

use App\Accounting\Customer\Customer;
use App\Accounting\Entry\Entry;
use App\Accounting\PostingRule\PostingRule;

class AccountingEvent
{
    /**
     * @var EventType
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $whenOccured;

    /**
     * @var \DateTime
     */
    private $whenNoticed;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var array
     */
    private $resultingEntries = [];

    public function __construct(
        EventType $type,
        \DateTime $whenOccured,
        \DateTime $whenNoticed,
        Customer $customer
    ) {
        $this->type = $type;
        $this->whenOccured = $whenOccured;
        $this->whenNoticed = $whenNoticed;
        $this->customer = $customer;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @return EventType
     */
    public function getType(): EventType
    {
        return $this->type;
    }

    /**
     * @return \DateTime
     */
    public function getWhenOccured(): \DateTime
    {
        return $this->whenOccured;
    }

    /**
     * @return \DateTime
     */
    public function getWhenNoticed(): \DateTime
    {
        return $this->whenNoticed;
    }

    /**
     * @param Entry $entry
     */
    public function addResultingEntry(Entry $entry): void
    {
        $this->resultingEntries[] = $entry;
    }

    /**
     * @return PostingRule
     */
    public function findRule(): PostingRule
    {
        return $this->customer->getServiceAgreement()->getPostingRule(
            $this->getType(),
            $this->getWhenNoticed()
        );
    }

    /**
     * Process event
     */
    public function process(): void
    {
        $this->findRule()->process($this);
    }
}
