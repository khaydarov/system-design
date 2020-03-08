<?php
declare(strict_types=1);

namespace App\Structural\Proxy\Example1;

/**
 * Class BankAccount
 * @package App\Structural\Proxy\Example1
 */
interface BankAccount
{
    public function deposit(int $amount);

    public function getBalance(): int;
}