<?php

namespace App\Patterns\FactoryMethod;

require_once '../../../vendor/autoload.php';

$manager = new BloggsCommsManager();

echo $manager->getHeaderText() . PHP_EOL;
echo $manager->getApptEncoder()->encode() . PHP_EOL;
echo $manager->getFooterText() . PHP_EOL;