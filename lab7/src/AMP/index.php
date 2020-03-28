<?php

require '../../vendor/autoload.php';

use Amp\Loop;

function tick() {
    echo "tick\n";
}

echo "-- before Loop::run()\n";

//Loop::run(function() {
//    Loop::repeat($msInterval = 0, "tick");
//    Loop::delay($msDelay = 5000, "Amp\\Loop::stop");
//});

$text = null;

function onInput($watcherId, $stream)
{
    global $text;

    $text = fgets($stream);
    stream_set_blocking(STDIN, true);

    Loop::cancel($watcherId);
    Loop::stop();
}

Loop::run(function() {
    echo "Please input some text: ";
    stream_set_blocking(STDIN, false);

    // Watch STDIN for input
    Loop::onReadable(STDIN, "onInput");

    // Impose a 5-second timeout if nothing is input
    Loop::delay($msDelay = 5000, "Amp\\Loop::stop");
});

print_r($text);