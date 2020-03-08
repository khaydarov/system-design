<?php
declare(strict_types=1);

namespace App\PropertyObject;

class Address extends PropertyObject
{
    public function __construct(array $data)
    {
        parent::__construct(new AddressProperties(), $data);
    }

    public function cityGet()
    {
        return $this->city;
    }
}