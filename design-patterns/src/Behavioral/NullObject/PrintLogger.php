<?php
declare(strict_types=1);

namespace App\Behavioral\NullObject;

/**
 * Class PrintLogger
 * @package App\Behavioral\NullObject
 */
class PrintLogger implements LoggerInterface
{
    public function log(string $str)
    {
        echo $str;
    }
}