<?php

use App\PropertyObject\Address;

require_once '../../vendor/autoload.php';

$address = new Address([
    'city' => 'Beijing'
]);

echo $address->cityGet() . PHP_EOL;

$anotherAddress = new Address([
    'city' => 'London'
]);

//$anotherAddress->setCity('New York');

echo $anotherAddress->cityGet() . PHP_EOL;