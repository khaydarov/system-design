<?php
declare(strict_types=1);

use App\Structural\Proxy\Example1\BankAccountProxy;
use PHPUnit\Framework\TestCase;

/**
 * Class ProxyTest
 */
class ProxyTest extends TestCase
{
    public function testProxyBankAccount()
    {
        /**
         * proxy is a wrapper for heave bank account
         */
        $account = new BankAccountProxy();
        $account->deposit(10);
        $account->deposit(20);

        $this->assertSame(30, $account->getBalance());
    }
}