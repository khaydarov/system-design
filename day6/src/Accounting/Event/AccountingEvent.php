<?php
declare(strict_types=1);

namespace App\Accounting\Event;

use App\Accounting\Customer\Customer;
use App\Accounting\Entry\Entry;
use App\Accounting\PostingRule\PostingRule;

class AccountingEvent
{
    /**
     * @var string
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

    /**
     * @var array
     */
    private $secondaryEvents = [];

    public function __construct(
        string $type,
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
     * @return string
     */
    public function getType(): string
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
     * @return array
     */
    public function getResultingEntries(): array
    {
        return $this->resultingEntries;
    }

    /**
     * @return array
     */
    public function getAllResultingEntries(): array
    {
        $result = $this->resultingEntries;
        foreach ($this->secondaryEvents as $event) {
            /** @var AccountingEvent $event */
            $result[] = $event->getAllResultingEntries();
        }

        return $result;
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

    /**
     * @param AccountingEvent $event
     */
    public function friendAddSecondaryEvent(AccountingEvent $event)
    {
        $this->secondaryEvents[] = $event;
    }
}
