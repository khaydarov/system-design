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

        $config->set('HTML.Allowed', '*');
//        $config->set('Attr.AllowedClasses', 'cdx-marked-text, marked-text');
//
//        $config->set('HTML.TargetNoopener', true);
//        $config->set('HTML.TargetNoreferrer', true);
//        $config->set('HTML.TargetBlank', true);
//        $config->set('HTML.Nofollow', true);
//        $config->set('URI.AllowedSchemes', ['http' => true, 'https' => true, 'mailto' => true]);
//        $config->set('AutoFormat.RemoveEmpty', true);
//
//        $config->set('HTML.DefinitionID', 'html5-definitions'); // unqiue id
//        $config->set('HTML.DefinitionRev', 1);

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