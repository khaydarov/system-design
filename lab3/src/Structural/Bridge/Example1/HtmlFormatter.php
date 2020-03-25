<?php
declare(strict_types=1);

namespace App\Structural\Bridge\Example1;

/**
 * Class HtmlFormatter
 * @package App\Structural\Bridge\Example1
 */
class HtmlFormatter implements Formatter
{
    public function format(string $text): string
    {
        return sprintf("<p>%s</p>", $text);
    }
}