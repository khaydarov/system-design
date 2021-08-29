<?php

declare(strict_types=1);

namespace App\ValueObject;

class OrderId
{
    /**
     * @var mixed
     */
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isEqual(OrderId $orderId)
    {
        return $this->value === $orderId->getValue();
    }

    public static function create(): static
    {
        return new static('generated identifier');
    }
}