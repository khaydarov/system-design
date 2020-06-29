<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Class OrderRepository
 * @package App\Solid\Example2
 */
class OrderRepository
{
    /**
     * @var OrderSourceInterface
     */
    private $source;

    /**
     * @param OrderSourceInterface $source
     */
    public function setSource(OrderSourceInterface $source)
    {
        $this->source = $source;
    }

    /**
     * @param $orderId
     * @return mixed
     */
    public function load($orderId)
    {
        return $this->source->load($orderId);
    }

    /**
     * @param $order
     */
    public function save($order)
    {
        //
    }

    /**
     * @param $order
     */
    public function update($order)
    {
        //
    }

    /**
     * @param $order
     */
    public function delete($order)
    {
        //
    }
}
