<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type;

use App\graphql\blog\Blog\Data\DataSource;
use App\graphql\blog\Blog\Data\Story;
use App\graphql\blog\Blog\Data\User;
use App\graphql\blog\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Class QueryType
 * @package App\graphql\blog\Blog\Type
 */
class QueryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'user' => [
                    'type' => Types::user(),
                    'description' => 'Returns User by id',
                    'args' => [
                        'id' => Types::id()
                    ]
                ],
                'story' => [
                    'type' => Types::story(),
                    'description' => 'Single story',
                    'args' => [
                        'id' => Types::id()
                    ]
                ],
                'stories' => [
                    'type' => Types::listOf(Types::story()),
                    'description' => 'Stories...',
                    'args' => [
                        'after' => [
                            'type' => Types::id(),
                            'description' => 'fetch stories after this id'
                        ],
                        'limit' => [
                            'type' => Types::int(),
                            'description' => 'Limit',
                            'defaultValue' => 10
                        ]
                    ]
                ],
                'lastStory' => [
                    'type' => Types::story(),
                    'description' => 'Last story posted'
                ],
                'hello' => Types::string(),
                'deprecatedField' => [
                    'type' => Types::string(),
                    'deprecationReason' => 'This field is deprecated'
                ],
                'fieldWithException' => [
                    'type' => Types::string(),
                    'resolve' => function () {
                        throw new \Exception('Exception message thrown in field resolver');
                    }
                ]
            ],
            'resolveField' => function ($rootValue, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($rootValue, $args, $context, $info);
            }
        ];

        parent::__construct($config);
    }

    /**
     * @param $rootValue
     * @param $args
     * @param $context
     * @return User|null
     */
    public function user($rootValue, $args, $context): ?User
    {
        return DataSource::findUser($args['id']);
    }

    /**
     * @param $rootValue
     * @param $args
     * @return Story
     */
    public function story($rootValue, $args): Story
    {
        return DataSource::findStory($args['id']);
    }

    /**
     * @param $rootValue
     * @param $args
     * @return array
     */
    public function stories($rootValue, $args): array
    {
        $args += [
            'after' => null
        ];

        return DataSource::findStories($args['limit'], $args['after']);
    }

    /**
     * @return Story
     */
    public function lastStory(): Story
    {
        return DataSource::findLatestStory();
    }

    /**
     * @return string
     */
    public function deprecatedField(): string
    {
        return 'It is deprecated';
    }

    /**
     * @return string
     */
    public function hello(): string
    {
        return 'Hello!';
    }
}
