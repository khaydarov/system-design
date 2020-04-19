<?php

use App\Kses;
use App\PhpInputFilter;
use App\Sanitizer;
use App\StripTags;
use App\Htmlawed;
use App\HtmlPurifier;

error_reporting(E_ERROR | E_PARSE);

require_once '../vendor/autoload.php';
require_once 'kses/kses.php';


$strings = require 'strings.php';
$sanitizers = [
    new Htmlawed(),
    new StripTags(),
    new HtmlPurifier(),
    new PhpInputFilter(),
    new Kses()
];

foreach ($strings as $string) {
    echo sprintf("String: %s\n", $string);
    foreach ($sanitizers as $sanitizer) {
        /** @var Sanitizer $sanitizer */
        echo sprintf("%s: %s\n", (string) $sanitizer,  $sanitizer->doSanitize($string));
    }
    echo sprintf("\n\n");
}