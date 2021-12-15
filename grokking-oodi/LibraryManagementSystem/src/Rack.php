<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem;

final class Rack
{
    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $location;

    public function __construct(int $number, string $location)
    {
        $this->number = $number;
        $this->location = $location;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }
}