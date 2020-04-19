<?php

declare(strict_types=1);

namespace App;

use HTMLPurifier_Config;

/**
 * Class HtmlPurifier
 * @package App
 */
class HtmlPurifier implements Sanitizer
{
    /**
     * @param $text
     * @return string
     */
    public function doSanitize($text): string
    {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', '');

        $purifier = new \HTMLPurifier($config);
        return $purifier->purify($text);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'HtmlPurifier';
    }
}