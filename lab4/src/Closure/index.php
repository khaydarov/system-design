<?php
declare(strict_types=1);

namespace App\Closure;

use function Psy\sh;

require_once '../../vendor/autoload.php';

class Product
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var int
     */
    private int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class ProcessSale
{
    private array $callbacks = [];

    public function registerCallback(callable $callback): void
    {
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product): void
    {
        foreach ($this->callbacks as $callback) {
            $callback($product);
        }
    }
}

class Totalizer
{
    public static function sum()
    {
        $count = 0;
        return function (Product $product) use (&$count) {
            $count += $product->getPrice();

            echo 'Sum: ' . $count . PHP_EOL;
        };
    }
}

$logger = function (Product $product) {
    echo 'Product: ' . $product->getName() . PHP_EOL;
};

$processor = new ProcessSale();
$processor->registerCallback($logger);
$processor->registerCallback(Totalizer::sum());

$processor->sale(new Product('Shoes', 10));
$processor->sale(new Product('Hat', 25));

eval(\Psy\sh());