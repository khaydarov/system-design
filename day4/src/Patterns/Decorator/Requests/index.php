<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Requests;

require_once '../../../../vendor/autoload.php';

$process = new AuthentificationRequestProcessor( new LogRequestProcessor(
        new MainRequestProcessor() ) );

$process->process(new RequestHelper());