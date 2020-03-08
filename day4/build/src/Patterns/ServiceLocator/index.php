<?php
declare(strict_types=1);

namespace App\Patterns\ServiceLocator;

require_once '../../../vendor/autoload.php';

$commsManager = AppConfig::getInstance()->getCommsManager();
var_dump($commsManager->getApptEncoder()->encode());