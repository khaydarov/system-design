<?php
declare(strict_types=1);

namespace App\Patterns\Strategy;

require_once '../../../vendor/autoload.php';

/** @var Lesson[] $lessons */
$lessons[] = new Seminar(1, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());

$sum = 0;
foreach ($lessons as $lesson) {
    $sum += $lesson->cost();
}

echo 'Sum is: ' . $sum . PHP_EOL;