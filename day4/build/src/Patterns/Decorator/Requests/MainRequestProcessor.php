<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Requests;

/**
 * Class MainRequestProcessor
 * @package App\Patterns\Decorator\Requests
 */
class MainRequestProcessor extends RequestProcessor
{
    public function process(RequestHelper $request)
    {
        echo __CLASS__ . ': processing request..' . PHP_EOL;
    }
}