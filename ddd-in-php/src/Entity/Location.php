<?php

declare(strict_types=1);

namespace App\Entity;

class Location
{
    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param LocationValidationHandler $validationHandler
     */
    public function validate(LocationValidationHandler $validationHandler)
    {
        $validator = new LocationValidator($this, $validationHandler);
        $validator->validate();
    }
}