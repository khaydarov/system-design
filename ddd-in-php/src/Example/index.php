<?php

use App\Example\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once '../../vendor/autoload.php';

$request = Request::createFromGlobals();
$contexts = [
    './Content/',
    './Shared/',
    './User/'
];

$kernel = new Kernel($contexts);

$response = $kernel->handle($request);
$response->send();