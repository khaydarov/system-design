<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Requests;

/**
 * Class AuthentificationRequestProcessor
 * @package App\Patterns\Decorator\Requests
 */
class AuthentificationRequestProcessor extends RequestProcessorDecorator
{
    public function process(RequestHelper $request)
    {
        echo __CLASS__ . ': authentificate request' . PHP_EOL;

        $this->processor->process($request);
    }
}