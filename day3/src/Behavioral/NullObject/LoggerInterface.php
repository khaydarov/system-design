<?php
declare(strict_types=1);

namespace App\Behavioral\NullObject;

/**
 * Interface LoggerInterface
 * @package App\Behavioral\NullObject
 */
interface LoggerInterface
{
    public function log(string $str);
}