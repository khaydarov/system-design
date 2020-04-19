<?php

declare(strict_types=1);

namespace App;

/**
 * Class Htmlawed
 * @package App
 */
class Htmlawed implements Sanitizer
{
    public function doSanitize($text): string
    {
        return \Htmlawed::filter($text);
    }

    public function __toString(): string
    {
        return 'Htmlawed';
    }
}
