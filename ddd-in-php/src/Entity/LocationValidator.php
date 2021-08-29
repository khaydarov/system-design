<?php

declare(strict_types=1);

namespace App\Entity;

class LocationValidator
{
    /**
     * @var Location
     */
    private $location;

    /**
     * @var LocationValidationHandler
     */
    private $validationHandler;

    public function __construct(Location $location, LocationValidationHandler $validationHandler)
    {
        $this->location = $location;
        $this->validationHandler = $validationHandler;
    }

    public function validate()
    {
        if (!is_float($this->location->getLatitude())) {
            $this->validationHandler->invalidLatitude();
        }

        if (!is_float($this->location->getLongitude())) {
            $this->validationHandler->invalidLongitude();
        }
    }
}