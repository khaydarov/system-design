<?php

declare(strict_types=1);

namespace App\ValueObject;

class Order
{
    /**
     * @var OrderId
     */
    private $id;

    /**
     * @var Money
     */
    private $amount;

    /**
     * @var string
     */
    private $name;

    public function __construct(OrderId $id, Money $amount, $name)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->name = $name;
    }

    public function getId(): OrderId
    {
        return $this->id;
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function getName(): string
    {
        return $this->name;
    }
}