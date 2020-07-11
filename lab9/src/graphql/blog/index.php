<?php

namespace App\graphql\blog;

use App\graphql\blog\Blog\Data\DataSource;
use App\graphql\blog\Blog\Type\QueryType;
use GraphQL\Error\DebugFlag;
use GraphQL\Error\FormattedError;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use PHPUnit\Util\Exception;

require_once './../../../vendor/autoload.php';

$debug = DebugFlag::NONE;
if (!empty($_GET['debug'])) {
    set_error_handler(function($severity, $message, $file, $line) use (&$phpErrors) {
        throw new Exception($message, 0, $severity, $file, $line);
    });
    $debug = DebugFlag::INCLUDE_DEBUG_MESSAGE | DebugFlag::INCLUDE_TRACE;
}

try {
    DataSource::init();

    $context = new Context();
    $context->viewer = DataSource::findUser('1');
    $context->roolUrl = 'http://localhost:8080';
    $context->request = $_REQUEST;

    if (
        isset($_SERVER['CONTENT_TYPE'])
        && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false
    ) {
        $raw = file_get_contents('php://input') ?? '';
        $data = json_decode($raw, true) ?? [];
    } else {
        $data = $_REQUEST;
    }

    $q = '{
        user(id: 1) {
            photo {
                url
            }
        }
    }';

    $data += [
        'query' => $q,
        'variables' => null
    ];

    if ($data['query'] === null) {
        $data['query'] = '{hello}';
    }

    $schema = new Schema([
        'query' => new QueryType()
    ]);

    $result = GraphQL::executeQuery(
        $schema,
        $data['query'],
        null,
        $context,
        $data['variables']
    );

    $output = $result->toArray($debug);
    $httpStatus = 200;
} catch (\Exception $e) {
    $output = [
        'errors' => FormattedError::createFromException($e, $debug)
    ];
    $httpStatus = 500;
}

header('Content-Type: application/json', true, $httpStatus);
echo json_encode($output);
//dump($output);



