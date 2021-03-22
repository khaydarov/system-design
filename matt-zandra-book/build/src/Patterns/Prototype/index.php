<?php

namespace App\Patterns\Prototype;

use App\Patterns\Prototype\Forest\EarthForest;
use App\Patterns\Prototype\Plains\EarthPlains;
use App\Patterns\Prototype\Sea\MarsSea;

require_once '../../../vendor/autoload.php';

$factory = new TerrainFactory(
    new MarsSea(-3),
    new EarthPlains(),
    new EarthForest()
);

$sea1 = $factory->getSea();
$sea1->changeNavigability(10);
var_dump($sea1);

$sea2 = $factory->getSea();
var_dump($sea2);
