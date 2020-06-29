<?php
declare(strict_types=1);

use App\Solid\Example1\AreaCalculator;
use App\Solid\Example1\Circle;
use App\Solid\Example1\Square;
use App\Solid\Example1\SumCalculatorOutputter;

require_once '../../../vendor/autoload.php';

$shapes = [
    new Circle(3),
    new Square(5)
];

$calculator = new AreaCalculator($shapes);
$outputter = new SumCalculatorOutputter($calculator);

echo $calculator->sum();