<?php
declare(strict_types=1);

namespace App\Structural\Bridge\Example1;

/**
 * Class PlainTextFormatter
 * @package App\Structural\Bridge\Example1
 */
class PlainTextFormatter implements Formatter
{
    public function format(string $text): string
    {
        return $text;
    }
}