<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example2;

/**
 * Class PlainTextFilter
 * @package App\Structural\Decorator\Example2
 */
class PlainTextFilter extends TextFormat
{
    public function formatText(string $text): string
    {
        $text = $this->formatText($text);
        return strip_tags($text);
    }
}