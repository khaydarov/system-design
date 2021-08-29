<?php

declare(strict_types=1);

namespace App\ValueObject;

class Money
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function isEqual(Money $money): bool
    {
        return $this->amount === $money->getAmount() && $this->currency === $money->getCurrency();
    }
}