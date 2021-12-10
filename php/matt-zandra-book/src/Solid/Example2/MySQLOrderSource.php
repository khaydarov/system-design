<?php
declare(strict_types=1);

namespace App\Solid\Example2;

/**
 * Class MySQLOrderSource
 * @package App\Solid\Example2
 */
class MySQLOrderSource implements OrderSourceInterface
{
    public function load($orderId)
    {
        // TODO: Implement load() method.
    }

    public function save($order)
    {
        // TODO: Implement save() method.
    }

    public function update($order)
    {
        // TODO: Implement update() method.
    }

    public function delete($order)
    {
        // TODO: Implement delete() method.
    }
}