<?php
declare(strict_types=1);

use App\Patterns\Command\Controller;

require_once '../../../vendor/autoload.php';

$controller = new Controller();
$context = $controller->getContext();

$context->addParam('action', 'login');
$context->addParam('user', 'bob');
$context->addParam('password', 'bb');
$controller->process();

print $context->getError();