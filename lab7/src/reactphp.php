<?php

require './../vendor/autoload.php';

// basic promise usage
$promise = React\Promise\resolve($value = 10);
$promise
    ->then(function ($value) {
        return $value * 10;
    })
    ->then(function ($changed) {
        echo $changed;
    });

// promise all usage
$firstResolver = new \React\Promise\Deferred();
$secondResolver = new \React\Promise\Deferred();

$pending = [
    $firstResolver->promise(),
    $secondResolver->promise()
];

$promise = \React\Promise\all($pending)->then(function($resolved){
    print_r($resolved); // [10, 20]
});

$firstResolver->resolve(10);
$secondResolver->resolve(20);

// Event-loop usage
//$loop = React\EventLoop\Factory::create();

//$server = stream_socket_server('tcp://127.0.0.1:8080');
//stream_set_blocking($server, false);
//
//$loop->addReadStream($server, function ($server) use ($loop) {
//    $conn = stream_socket_accept($server);
//    $data = "HTTP/1.1 200 OK\r\nContent-Length: 3\r\n\r\nHi\n";
//    $loop->addWriteStream($conn, function ($conn) use (&$data, $loop) {
//        $written = fwrite($conn, $data);
//        if ($written === strlen($data)) {
//            fclose($conn);
//            $loop->removeWriteStream($conn);
//        } else {
//            $data = substr($data, $written);
//        }
//    });
//});
//
//$loop->addPeriodicTimer(5, function () {
//    $memory = memory_get_usage() / 1024;
//    $formatted = number_format($memory, 3).'K';
//    echo "Current memory usage: {$formatted}\n";
//});
//
//$loop->run();