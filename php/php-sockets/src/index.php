<?php

require '../vendor/autoload.php';

$socket = stream_socket_server("tcp://0.0.0.0:9999", $errno, $errstr);
//$socket = socket_create(AF_UNIX, SOCK_DGRAM, 0);

if (!$socket) {
    die("$errstr ($errno)\n");
}

while ($connection = stream_socket_accept($socket, 5)) {
    fputs($connection, "OK");
}

fclose($socket);