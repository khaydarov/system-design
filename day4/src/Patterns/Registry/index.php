<?php
declare(strict_types=1);

namespace App\Patterns\Registry;

require_once '../../../vendor/autoload.php';

$registry = Registry::instance();
$registry->getRequest();