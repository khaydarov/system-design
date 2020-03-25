<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example2;

/**
 * Class TextInput
 * @package App\Structural\Decorator\Example2
 */
class TextInput extends TextFormat
{
    public function formatText(string $text): string
    {
        return $text;
    }
}