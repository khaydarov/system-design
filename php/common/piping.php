<?php

use Khaydarovm\Common\FileReader\Utils;

require_once 'vendor/autoload.php';

// ------ Bad way. Uses a lot of memory ------ //
//file_put_contents('log.copy.txt', file_get_contents('log.txt')); // 85 Mb

// ------ Using streams ----- //
//$h1 = fopen('log.txt', 'r');
//$h2 = fopen('log.copy.txt', 'w');
//
//stream_copy_to_stream($h1, $h2); // 540 Kb
//
//fclose($h1);
//fclose($h2);

// ------ Bad way. Uses a lot of memory ------ //
//$zip = new ZipArchive();
//$file = 'log.zip';
//$zip->open($file, ZipArchive::CREATE);
//$zip->addFromString('log', file_get_contents('log.txt'));
//$zip->close();

// ------ Using filters ------ //
//$h1 = fopen(
//    "php://filter/zlib.deflate/resource=log.txt", "r"
//);
//
//$h2 = fopen('log.deflated', 'w');
//
//stream_copy_to_stream($h1, $h2); // 958 Kb
//fclose($h1);
//fclose($h2);

$fp1 = fopen('php://stdin', 'r');
$fp2 = fopen('php://stdout', 'w');

while (!feof($fp1)) {
    $data = trim(fgets($fp1, 1024));
    fwrite($fp2, $data);
}

echo Utils::formatBytes(memory_get_peak_usage());
