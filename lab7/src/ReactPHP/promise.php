<?php

use React\Promise\Deferred;

require './../../vendor/autoload.php';

// basic promise usage
$promise = React\Promise\resolve($value = 10);
$promise
    ->then(function ($value) {
        return $value * 10;
    })
    ->then(function ($changed) {
        echo $changed . "\n";
    });

// promise all usage
$firstResolver = new Deferred();
$secondResolver = new Deferred();

$pending = [
    $firstResolver->promise(),
    $secondResolver->promise()
];

$promise = React\Promise\all($pending)->then(function($resolved){
    print_r($resolved); // [10, 20]
});

$firstResolver->resolve(10);
$secondResolver->resolve(20);