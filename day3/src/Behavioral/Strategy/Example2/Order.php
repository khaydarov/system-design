<?php
declare(strict_types=1);

namespace App\Behavioral\Strategy\Example2;

/**
 * Class Order
 * @package App\Behavioral\Strategy\Example2
 */
class Order
{
    private static $orders = [];

    /**
     * @param int|null $order_id
     * @return array|mixed
     */
    public static function get(int $order_id = null)
    {
        if ($order_id === null) {
            return static::$orders;
        }
        return static::$orders[$order_id];
    }

    /**
     * Order constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->id = count(static::$orders);
        $this->status = "new";

        foreach ($attributes as $key => $value) {
            $this->{$key} = $value;
        }

        static::$orders[$this->id] = $this;
    }

    public function complete(): void
    {
        $this->status = "completed";
        echo "Order: #{$this->id} is now {$this->status}.";
    }
}