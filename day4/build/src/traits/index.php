<?php
declare(strict_types=1);

namespace App\traits;

require_once '../../vendor/autoload.php';

$service = new UtilityService();
echo $service->generateId() . PHP_EOL; // method from identity trait
echo $service->calculateTax(123) . PHP_EOL; // method from tax trait
echo UtilityService::getTaxRate() . PHP_EOL; // static method from tax trait

$service->setTaxRate(0.66); // setting taxrate
echo $service::getTaxRate() . PHP_EOL; // static method from tax trait

$s1 = new UtilityService(); // wtf???
echo $s1::getTaxRate();