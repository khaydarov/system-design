<?php

declare(strict_types=1);

namespace App;

/**
 * Class PhpInputFilter
 * @package App
 */
class PhpInputFilter implements Sanitizer
{
    /**
     * @param $text
     * @return string
     */
    public function doSanitize($text): string
    {
        $tags = ["a", "img"];
        $filter = new \InputFilter($tags, ["src"], 0, 0);

        return $filter->process($text) ?? '';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'PHP Input Filter';
    }
}