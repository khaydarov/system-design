<?php
declare(strict_types=1);

namespace App\Structural\Proxy\Example1;

/**
 * Class BankAccountProxy
 * @package App\Structural\Proxy\Example1
 */
class BankAccountProxy extends HeavyBankAccount
{
    /**
     * @var int
     */
    private $balance;

    /**
     * Works like cache
     *
     * @return int
     */
    public function getBalance(): int
    {
        if ($this->balance === null) {
            $this->balance = parent::getBalance();
        }

        return $this->balance;
    }
}