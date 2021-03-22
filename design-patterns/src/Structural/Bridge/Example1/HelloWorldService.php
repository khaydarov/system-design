<?php
declare(strict_types=1);

namespace App\Structural\Bridge\Example1;

/**
 * Class HelloWorldService
 * @package App\Structural\Bridge\Example1
 */
class HelloWorldService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('Hello');
    }
}