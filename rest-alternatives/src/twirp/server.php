<?php

use App\Twirp\Src\Twirp\Haberdasher;
use Twirp\Example\Haberdasher\HaberdasherServer;

require __DIR__ . '/../../vendor/autoload.php';

$request = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();

$server = new Twirp\Server();
$handler = new HaberdasherServer(new Haberdasher());
$server->registerServer(HaberdasherServer::PATH_PREFIX, $handler);

$response = $server->handle($request);

if ( !headers_sent() ) {
    header(
        sprintf('HTTP/%s %s %s',
            $response->getProtocolVersion(),
            $response->getStatusCode(),
            $response->getReasonPhrase()
        ),
        true,
        $response->getStatusCode()
    );

    foreach ($response->getHeaders() as $header => $values) {
        foreach ($values as $value) {
            header($header . ': '. $value, false, $response->getStatusCode());
        }
    }
}

echo $response->getBody();
