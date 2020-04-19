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
    public function doSanitize($text): string
    {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', '');

        $purifier = new \HTMLPurifier($config);
        return $purifier->purify($text);
    }

    public function __toString()
    {
        return 'HtmlPurifier';
    }
}