<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type;

use App\graphql\blog\Blog\Data\DataSource;
use App\graphql\blog\Blog\Data\User;
use App\graphql\blog\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class UserType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'User',
            'description' => 'Blog authors',
            'fields' => function() {
                return [
                    'id' => Types::id(),
                    'name' => Types::string(),
                    'email' => Types::string(),
                    'photo' => [
                        'type' => Types::image(),
                        'description' => 'user picture'
                    ],
                    'lastStory' => Types::story()
                ];
            },
            'resolveField' => function ($user, $args, $context, ResolveInfo $info) {
                $method = 'resolve' . ucfirst($info->fieldName);

                if (method_exists($this, $method)) {
                    return $this->{$method}($user, $args, $context, $info);
                }

                return $user->{$info->fieldName};
            }
        ];

        parent::__construct($config);
    }

    public function resolveLastStory(User $user)
    {
        return DataSource::findLastStoryFor($user->id);
    }
}
