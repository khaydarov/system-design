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
use App\Accounting\PostingRule\PoorCapPR;
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
            EventType::USAGE,
            new MultiplyByRatePR(EntryType::USAGE),
            new \DateTime()
        );

        $customer->setServiceAgreement($agreement);

        // trigger event
        $event = new Usage(
            100,
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
            EventType::SERVICE_CALL,
            new AmountFormulaPR(1.2, 100, EntryType::SERVICE_FEE),
            new \DateTime()
        );

        $customer->setServiceAgreement($agreement);

        // trigger event
        $event = new Monetary(
            100,
            EventType::SERVICE_CALL,
            new \DateTime(),
            new \DateTime(),
            $customer
        );

        $event->process();

        $this->assertEquals(220, $customer->getEntry(0)->getMoney());
    }

    public function testThird(): void
    {
        // set up
        $customer = new Customer("Tester");

        $agreement = new ServiceAgreement();
        $agreement->addPostingRule(
            EventType::SERVICE_CALL,
            new AmountFormulaPR(1.2, 100, EntryType::SERVICE_FEE),
            new \DateTime('yesterday')
        );
        $agreement->addPostingRule(
            EventType::SERVICE_CALL,
            new AmountFormulaPR(1, 200, EntryType::SERVICE_FEE),
            new \DateTime('today')

        );
        $agreement->addPostingRule(
            EventType::USAGE,
            new MultiplyByRatePR(EntryType::USAGE),
            new \DateTime()
        );

        $customer->setServiceAgreement($agreement);

        // trigger event
        $event = new Monetary(
            100,
            EventType::SERVICE_CALL,
            new \DateTime(),
            new \DateTime('today'),
            $customer
        );

        $event->process();

        $this->assertEquals(300, $customer->getEntry(0)->getMoney());
    }

    public function testFourth(): void
    {
        // set up
        $customer = new Customer("Tester");

        $agreement = new ServiceAgreement();
        $agreement->setRate(10);
        $agreement->addPostingRule(
            EventType::USAGE,
            new PoorCapPR(EntryType::USAGE, 5, 50),
            new \DateTime('yesterday')
        );
        $agreement->addPostingRule(
            EventType::SERVICE_CALL,
            new AmountFormulaPR(0, 100, EntryType::SERVICE_FEE),
            new \DateTime('today')
        );

        $customer->setServiceAgreement($agreement);

        $yesterday = new Usage(
            60,
            new \DateTime(),
            new \DateTime('yesterday'),
            $customer
        );

        $yesterday->process();

        $today = new Usage(
            40,
            new \DateTime(),
            new \DateTime('yesterday'),
            $customer
        );

        $today->process();

        $this->assertEquals(600, $customer->getEntry(0)->getMoney());
        $this->assertEquals(200, $customer->getEntry(1)->getMoney());
    }

    public function testFifth(): void
    {
        // set up
        $customer = new Customer("Tester");

        $agreement = new ServiceAgreement();
        $agreement->setRate(10);
        $agreement->addPostingRule(
            EventType::USAGE,
            new PoorCapPR(EntryType::USAGE, 10, 50),
            new \DateTime('today')
        );
        $agreement->addPostingRule(
            EventType::TAX,
            new AmountFormulaPR(0.055, 0, EntryType::TAX),
            new \DateTime('today')
        );

        $customer->setServiceAgreement($agreement);

        $event = new Usage(
            50,
            new \DateTime(),
            new \DateTime('today'),
            $customer
        );

        $event->process();

        $usageEntry = $customer->getEntry(0);
        $taxEntry = $customer->getEntry(1);

        $this->assertEquals(500, $usageEntry->getMoney());
        $this->assertEquals(EntryType::USAGE, $usageEntry->getType());
        $this->assertEquals(27.5, $taxEntry->getMoney());
        $this->assertEquals(EntryType::TAX, $taxEntry->getType());
    }

    public function testSix(): void
    {
        $revenue = new Account();
        $deferred = new Account();
        $receivables = new Account();

        // Two-ledged transactions

        $revenue->withdraw(500, $receivables, new \DateTime());
        $revenue->withdraw(200, $deferred, new \DateTime());
//
//        $this->assertEquals(500, $receivables->balance());
//        $this->assertEquals(200, $deferred->balance());
//        $this->assertEquals(-700, $revenue->balance());

        // Multi-ledged transactions

        $multi = new AccountingTransaction(new \DateTime());
        $multi->add(-700, $revenue);
        $multi->add(500, $receivables);
        $multi->add(200, $deferred);
        $multi->post();

        $this->assertEquals(500, $receivables->balance());
        $this->assertEquals(200, $deferred->balance());
        $this->assertEquals(-700, $revenue->balance());

        // withdraw from revenue account
        $revenue->withdraw(150, $deferred, new \DateTime());
        $this->assertEquals(-850, $revenue->balance());
    }
}