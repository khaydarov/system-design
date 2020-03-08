<?php
declare(strict_types=1);

namespace App\Structural\Proxy\Example1;

/**
 * Class HeavyBankAccount
 * @package App\Structural\Proxy\Example1
 */
class HeavyBankAccount implements BankAccount
{
    /**
     * @var int[]
     */
    private $transactions = [];

    /**
     * @param int $amount
     */
    public function deposit(int $amount)
    {
        $this->transactions[] = $amount;
    }

    /**
     * Heavy part
     *
     * @return int
     */
    public function getBalance(): int
    {
        return array_sum($this->transactions);
    }
}