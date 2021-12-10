<?php
declare(strict_types=1);

namespace App\Patterns\Decorator\Requests;

/**
 * Class RequestProcessorDecorator
 * @package App\Patterns\Decorator\Requests
 */
abstract class RequestProcessorDecorator extends RequestProcessor
{
    /**
     * @var RequestProcessor
     */
    protected RequestProcessor $processor;

    public function __construct(RequestProcessor $processor)
    {
        $this->processor = $processor;
    }
}