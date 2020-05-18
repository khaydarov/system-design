<?php

declare(strict_types=1);

namespace App;

/**
 * Class StripTags
 * @package App
 */
class StripTags implements Sanitizer
{
    /**
     * @param $text
     * @return string
     */
    public function doSanitize($text): string
    {
        return strip_tags($text, '<b><a>');
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'PHP strip_tags';
    }
}
