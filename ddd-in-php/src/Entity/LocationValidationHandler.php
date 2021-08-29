<?php

declare(strict_types=1);

namespace App\Entity;

use http\Exception\InvalidArgumentException;

class LocationValidationHandler implements ValidationHandler
{
    public function handleError($error)
    {
        throw new InvalidArgumentException($error);
    }

    public function invalidLatitude()
    {
        throw new InvalidArgumentException('Invalid latitude');
    }

    public function invalidLongitude()
    {
        throw new InvalidArgumentException('Invalid longitude');
    }
}