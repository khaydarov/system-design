<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Creational\AbstractFactory\Product;
use \App\Creational\AbstractFactory\ProductFactory;

class AbstractFactoryTest extends TestCase
{
    /**
     * @var ProductFactory
     */
    public $fixture = null;

    public function setUp(): void
    {
        $this->fixture = new ProductFactory();
    }

    public function testAbstractFactory(): void
    {
        $products = [];
        $products[] = $this->fixture->createDigitalProduct(10);
        $products[] = $this->fixture->createShippableProduct(15);

        $this->assertEquals(35, $this->calculateSum($products));
    }

    private function calculateSum(array $products): int {
        $sum = 0;
        foreach ($products as $product) {
            /** @var Product $product */
            $price = $product->calculatePrice();
            $sum += $price;
        }

        return $sum;
    }
}