<?php

use React\EventLoop\TimerInterface;

require './../../vendor/autoload.php';

// Event-loop usage
$loop = React\EventLoop\Factory::create();
$counter = 0;

// settimeout
//$loop->addTimer(5, function () {
//    echo "Hello!\n";
//});
//
//$loop->addPeriodicTimer(2, function(TimerInterface $timer) use (&$counter, $loop) {
//    $counter++;
//    echo "$counter\n";
//
//    if ($counter === 4) {
//        $loop->cancelTimer($timer);
//    }
//});

// Http server
$server = new React\Http\Server(function (\Psr\Http\Message\ServerRequestInterface $request) {
    return new React\Http\Response(
        200,
        [
            'Content-Type' => 'text/plain'
        ],
        "Hello!\n"
    );
});

$socket = new React\Socket\Server(8099, $loop);
$server->listen($socket);

echo "Server running at http://localhost:8089\n";

$loop->run();