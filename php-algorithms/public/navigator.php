<?php

use App\Navigator\Navigator;
use App\Navigator\Path;

require_once '../vendor/autoload.php';

$mapData = [];
$mapData['1']['2'] = [
    new Path(10, 60, 1),
    new Path(9, 60, 1)
];
$mapData['1']['3'] = [
    new Path(12, 60, 1)
];
$mapData['2']['4'] = [
    new Path(15, 60, 1)
];
$mapData['4']['5'] = [
    new Path(10, 60, 1),
    new Path(22, 60, 1)
];

$navigator = new Navigator($mapData);

/** @var []Route $routes */
$routes = $navigator->findRoutes('1', '5');

foreach ($routes as $route) {
    dump($route->calculateTime());
}