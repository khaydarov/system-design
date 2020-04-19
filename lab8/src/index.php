<?php

use App\Sanitizer;
use App\StripTags;
use App\Htmlawed;
use App\HtmlPurifier;

require_once '../vendor/autoload.php';

$strings = require 'strings.php';
$sanitizers = [
    new Htmlawed(),
    new StripTags(),
    new HtmlPurifier(),
];

foreach ($strings as $string) {
//    echo sprintf("String: %s\n", $string);
    foreach ($sanitizers as $sanitizer) {
        /** @var Sanitizer $sanitizer */
        echo sprintf("%s: %s\n", (string) $sanitizer,  htmlspecialchars($sanitizer->doSanitize($string)));
    }
    echo sprintf("\n\n");
}