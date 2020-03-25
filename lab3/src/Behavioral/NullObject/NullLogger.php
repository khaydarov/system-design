<?php
declare(strict_types=1);

namespace App\Behavioral\NullObject;

/**
 * Class NullLogger
 * @package App\Behavioral\NullObject
 */
class NullLogger implements LoggerInterface
{
    public function log(string $str)
    {
        // do nothing
    }
}