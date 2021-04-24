<?php

use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

require_once '../../../vendor/autoload.php';

try {
    $queryType = new ObjectType([
        'name' => 'Query',
        'fields' => [
            'echo' => [
                'type' => Type::string(),
                'args' => [
                    'message' => [
                        'type' => Type::string()
                    ]
                ],
                'resolve' => function ($rootValue, $args) {
                    return $rootValue['prefix'] . $args['message'];
                }
            ]
        ]
    ]);

    $mutationType = new ObjectType([
        'name' => 'Summator',
        'fields' => [
            'sum' => [
                'type' => Type::int(),
                'args' => [
                    'x' => ['type' => Type::int()],
                    'y' => ['type' => Type::int()],
                ],
                'resolve' => function ($calc, $args) {
                    return $args['x'] + $args['y'];
                },
            ],
        ],
    ]);

    $schema = new Schema([
        'query' => $queryType,
        'mutation' => $mutationType,
    ]);

//    $raw = '{"query": "query { echo(message: \"Hello World\") }" }';
    $raw = '{"query": "mutation { sum(x: 5, y: 2) }" }';
//    $raw = file_get_contents('php://input');
    $input = json_decode($raw, true);
    $query = $input['query'];
    $vars = $input['variable'] ?? null;

    $rootValue = ['prefix' => 'You said: '];
    $result = GraphQL::executeQuery($schema, $query, $rootValue, $vars);
    $output = $result->toArray();
} catch (\Exception $e) {
    $output = [
        'error' => [
            'message' => $e->getMessage()
        ]
    ];
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($output);