<?php
declare(strict_types=1);

namespace App\Patterns\Decorator;

require_once '../../../vendor/autoload.php';

$tile = new Plains();
echo $tile->getWealthFactor() . PHP_EOL;

$tile = new PollutionDecorator( new Plains() );
echo $tile->getWealthFactor() . PHP_EOL;

$tile = new PollutionDecorator( new DiamondDecorator( new Plains() ) );
echo $tile->getWealthFactor() . PHP_EOL;