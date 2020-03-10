<?php
declare(strict_types=1);

namespace App\Accounting\Customer;

use App\Accounting\Agreement\ServiceAgreement;
use App\Accounting\Entry\Entry;

/**
 * Class Customer
 * @package App\Accounting\Customer
 */
class Customer
{
    /**
     * @var ServiceAgreement
     */
    private $serviceAgreement;

    /**
     * @var array
     */
    private $entries = [];

    /**
     * @var string
     */
    private $name;

    /**
     * Customer constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Entry $entry
     */
    public function addEntry(Entry $entry)
    {
        $this->entries[] = $entry;
    }

    /**
     * @return array
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param int $index
     * @return Entry|null
     */
    public function getEntry(int $index): ?Entry
    {
        return $this->entries[$index] ?? null;
    }

    /**
     * @return ServiceAgreement
     */
    public function getServiceAgreement(): ServiceAgreement
    {
        return $this->serviceAgreement;
    }

    /**
     * @param ServiceAgreement $agreement
     */
    public function setServiceAgreement(ServiceAgreement $agreement): void
    {
        $this->serviceAgreement = $agreement;
    }
}
