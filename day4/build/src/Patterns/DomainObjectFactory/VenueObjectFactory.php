<?php
declare(strict_types=1);

namespace App\Patterns\DomainObjectFactory;

use App\Patterns\DomainModel\DomainObject;
use App\Patterns\DomainModel\Venue;

class VenueObjectFactory extends DomainObjectFactory
{
    public function createObject(array $row): DomainObject
    {
        return new Venue((int) $row['id'], $row['name']);
    }
}