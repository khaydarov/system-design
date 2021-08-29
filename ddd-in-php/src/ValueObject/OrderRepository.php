<?php

declare(strict_types=1);

namespace App\ValueObject;

class OrderRepository
{
    public function save(Order $order)
    {
        $dataToInsert = [
            'id' => $order->getId()->getValue(),
            'name' => $order->getName(),
            'amountValue' => $order->getAmount()->getAmount(),
            'amountCurrency' => $order->getAmount()->getCurrency()
        ];

        // ...
    }

    public function byId(OrderId $id): Order
    {
        // ... selection
        $data = [
            'amount' => 100,
            'currency' => 'USD',
            'name' => 'order name'
        ];

        return new Order(
            $id,
            new Money(
                $data['amount'],
                $data['currency'],
            ),
            $data['name']
        );
    }
}