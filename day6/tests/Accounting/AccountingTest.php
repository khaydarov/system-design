<?php
declare(strict_types=1);

namespace App\Accounting;

use App\Accounting\Agreement\ServiceAgreement;
use App\Accounting\Customer\Customer;
use App\Accounting\Entry\EntryType;
use App\Accounting\Event\EventType;
use App\Accounting\Event\Monetary;
use App\Accounting\Event\Usage;
use App\Accounting\PostingRule\AmountFormulaPR;
use App\Accounting\PostingRule\MultiplyByRatePR;
use PHPUnit\Framework\TestCase;

class AccountingTest extends TestCase
{
    public function testFirst(): void
    {
        // set up
        $customer = new Customer("Tester");

        $agreement = new ServiceAgreement();
        $agreement->setRate(3);
        $agreement->addPostingRule(
            EventType::getUsageType(),
            new MultiplyByRatePR(EntryType::getUsageType()),
            new \DateTime()
        );

        $customer->setServiceAgreement($agreement);

        // trigger event
        $event = new Usage(
            100,
            EventType::getUsageType(),
            new \DateTime(),
            new \DateTime(),
            $customer
        );

        $event->process();

        $this->assertEquals(300, $customer->getEntry(0)->getMoney());
    }

    public function testSecond()
    {
        // set up
        $customer = new Customer("Tester");

        $agreement = new ServiceAgreement();
        $agreement->addPostingRule(
            EventType::getServiceCallType(),
            new AmountFormulaPR(1.2, 100, EntryType::getServiceFeeType()),
            new \DateTime()
        );

        $customer->setServiceAgreement($agreement);

        // trigger event
        $event = new Monetary(
            100,
            EventType::getServiceCallType(),
            new \DateTime(),
            new \DateTime(),
            $customer
        );

        $event->process();

        $this->assertEquals(220, $customer->getEntry(0)->getMoney());
    }
}