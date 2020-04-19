<?php

declare(strict_types=1);

namespace App;

/**
 * Class Htmlawed
 * @package App
 */
class Htmlawed implements Sanitizer
{
    /**
     * @param $text
     * @return string
     */
    public function doSanitize($text): string
    {
        return \Htmlawed::filter($text);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'Htmlawed';
    }
}
