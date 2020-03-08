<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Requests;

/**
 * Class RequestProcessor
 * @package App\Patterns\Decorator\Requests
 */
abstract class RequestProcessor
{
    abstract public function process(RequestHelper $request);
}