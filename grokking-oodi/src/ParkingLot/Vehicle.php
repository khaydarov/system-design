<?php

declare(strict_types=1);

namespace App\PatkingLot;

class Vehicle
{
    /**
     * @var string
     */
    private $licenceNumber;

    public function __construct(string $licenceNumber)
    {
        $this->licenceNumber = $licenceNumber;
    }

    /**
     * @return string
     */
    public function getLicenceNumber(): string
    {
        return $this->licenceNumber;
    }
}