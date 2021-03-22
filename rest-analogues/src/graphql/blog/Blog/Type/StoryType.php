<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type;

use App\graphql\blog\Blog\Data\DataSource;
use App\graphql\blog\Blog\Data\Story;
use App\graphql\blog\Context;
use App\graphql\blog\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class StoryType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Story',
            'description' => 'Story',
            'fields' => function() {
                return [
                    'id' => Types::id(),
                    'author' => Types::user(),
                    Types::htmlField('body'),
//                    'body' => Types::string(),
                    'comments' => [
                        'type' => Types::listOf(Types::comment()),
                    ],
                    'totalCommentsCount' => Types::int(),
                    'likes' => [
                        'type' => Types::listOf(Types::user()),
                        'args' => [
                            'limit' => [
                                'type' => Types::int(),
                                'defaultValue' => 5
                            ]
                        ]
                    ],
                    'hasViewerLiked' => Types::boolean()
                ];
            },
            'interfaces' => [
                Types::node()
            ],
            'resolveField' => function($story, $args, $context, ResolveInfo $info) {
                $method = 'resolve' . ucfirst($info->fieldName);
                if (method_exists($this, $method)) {
                    return $this->{$method}($story, $args, $context, $info);
                }
                return $story->{$info->fieldName};
            }
        ];

        parent::__construct($config);
    }

    public function resolveAuthor(Story $story)
    {
        return DataSource::findUser($story->authorId);
    }

    public function resolveComments(Story $story, $args)
    {
        return DataSource::findComments($story->id);
    }

    public function resolveTotalCommentsCount(Story $story)
    {
        return DataSource::countComments($story->id);
    }

    public function resolveLikes(Story $story, $args)
    {
        return DataSource::findLikes($story->id, $args['limit']);
    }

    public function resolveHasViewerLiked(Story $story, $args, Context $context)
    {
        return DataSource::isLikedBy($story->id, $context->viewer->id);
    }
}