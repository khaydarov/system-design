<?php
declare(strict_types=1);

namespace App\Creational\Builder;

use App\Creational\Builder\Builders\BuilderInterface;
use App\Creational\Builder\Units\Unit;

class Director
{
    public function build(BuilderInterface $builder): Unit
    {
        $builder->createUnit();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheels();

        return $builder->getUnit();
    }
}