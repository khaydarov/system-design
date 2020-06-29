<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Interface OrderProcessorInterface
 * @package App\Solid\Example2
 */
interface OrderProcessorInterface
{
    public function checkout($order);
}
