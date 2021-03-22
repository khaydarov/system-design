<?php
declare(strict_types=1);

namespace App\Structural\Bridge\Example1;

/**
 * Class PingService
 * @package App\Structural\Bridge\Example1
 */
class PingService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('pong');
    }
}