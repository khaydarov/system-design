<?php
declare(strict_types=1);

namespace App\Reflection;

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

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    private function someMethod(): void
    {
        echo 'i am private';
    }
}