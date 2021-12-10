<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Class Customer
 * @package App\Solid\Example2
 */
class Customer
{
    /**
     * @var null|Order
     */
    private $order = null;

    /**
     * @param OrderProcessorInterface $processor
     * @return bool
     */
    public function buyItems(OrderProcessorInterface $processor)
    {
        if ($this->order === null) {
            return false;
        }

        return $processor->checkout($this->order);
    }

    /**
     * @param $item
     */
    public function addItem($item)
    {
        if ($this->order === null) {
            $this->order = new Order();
        }

        $this->order->addItem();
    }

    /**
     * @param $item
     */
    public function deleteItem($item)
    {
        if ($this->order === null) {
            //
        }

        $this->order->deleteItem();
    }
}
