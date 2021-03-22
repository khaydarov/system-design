<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example1;

/**
 * Class SlowStorage
 * @package App\Behavioral\ChainOfResponsibilities
 */
class SlowStorage extends Handler
{
    /**
     * @param RequestInterface $request
     * @return string
     */
    protected function processing(RequestInterface $request): string
    {
        return 'Hello, World!';
    }
}