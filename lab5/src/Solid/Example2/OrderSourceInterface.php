<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Interface OrderSourceInterface
 * @package App\Solid\Example2
 */
interface OrderSourceInterface
{
    public function load($orderId);
    public function save($order);
    public function update($order);
    public function delete($order);
}