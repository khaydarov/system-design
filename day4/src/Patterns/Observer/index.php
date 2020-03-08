<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

require_once '../../../vendor/autoload.php';

$login = new Login();

$observers = [
    SecurityMonitor::class,
    GeneralLogger::class,
    PartnershipTool::class
];

$loginObservers = [];

foreach ($observers as $observer) {
    $loginObservers[] = new $observer($login);
}

$login->handleLogin('me', 'my', 'localhost');