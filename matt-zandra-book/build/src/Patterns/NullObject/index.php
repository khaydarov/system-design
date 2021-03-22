<?php
declare(strict_types=1);

use App\Patterns\NullObject\TileForces;
use App\Patterns\NullObject\UnitAcquisition;

require_once '../../../vendor/autoload.php';

$acq = new UnitAcquisition();
$tileForces = new TileForces(4, 2, $acq);

$power = $tileForces->firePower();

print "Power: " . $power;