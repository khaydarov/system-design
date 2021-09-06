<?php

use App\Example\Content\Ui\Web\Kernel;
use Symfony\Component\HttpFoundation\Request;

require_once '../../../../../vendor/autoload.php';

$request = Request::createFromGlobals();
$kernel = new Kernel();

$response = $kernel->handle($request);
$response->send();