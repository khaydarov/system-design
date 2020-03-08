<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Requests;

/**
 * Class LogRequestProcessor
 * @package App\Patterns\Decorator\Requests
 */
class LogRequestProcessor extends RequestProcessorDecorator
{
    public function process(RequestHelper $request)
    {
        echo __CLASS__ . ': logging process' . PHP_EOL;
        $this->processor->process($request);
    }
}