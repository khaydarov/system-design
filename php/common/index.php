<?php

use Khaydarovm\Common\FileReader\Utils;

require_once 'vendor/autoload.php';

// Strict types

/**
    $two = new Two();
    $two->doWorkTwo();
    $a = test(5);
 */

// Closure (carrying)

/**
    $a = builder(5);
    echo $a(1) . PHP_EOL;
    echo $a(2) . PHP_EOL;

    function builder($n) {
        return function ($x) use (&$n) {
            $n += $x;

            return $n;
        };
    }
 */

// Reading big file

//$reader = new \Khaydarovm\Common\FileReader\Reader();
//$iterator = $reader->read('log.txt');
//foreach ($iterator as $line) {
//    var_dump($line);
//}

echo Utils::formatBytes(memory_get_peak_usage());