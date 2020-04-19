<?php

declare(strict_types=1);

namespace App;

/**
 * Class StripTags
 * @package App
 */
class StripTags implements Sanitizer
{
    public function doSanitize($text): string
    {
        return strip_tags($text, '<b><img><a>');
    }

    public function __toString(): string
    {
        return 'PHP strip_tags';
    }
}
