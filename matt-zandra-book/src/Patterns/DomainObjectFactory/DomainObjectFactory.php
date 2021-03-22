<?php
declare(strict_types=1);

namespace App\Patterns\DomainObjectFactory;

use App\Patterns\DomainModel\DomainObject;

abstract class DomainObjectFactory
{
    abstract public function createObject(array $row): DomainObject;
}