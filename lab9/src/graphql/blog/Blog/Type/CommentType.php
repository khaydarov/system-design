<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Type;

use App\graphql\blog\Blog\Data\Comment;
use App\graphql\blog\Blog\Data\DataSource;
use App\graphql\blog\Blog\Data\User;
use App\graphql\blog\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

/**
 * Class CommentType
 * @package App\graphql\blog\Blog\Type
 */
class CommentType extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Comment',
            'description' => 'Story comments',
            'fields' => [
                'id' => Types::id(),
                'author' => Types::user(),
                'parent' => Types::comment(),
                'body' => Types::string(),
                'isAnonymous' => Types::boolean(),
                'replies' => [
                    'type' => Types::listOf(Types::comment()),
                    'args' => [
                        'limit' => [
                            'type' => Types::int(),
                            'defaultValue' => 5
                        ]
                    ]
                ],
                'totalReplyCount' => Types::int()
            ],
            'resolveField' => function($comment, $args, $context, ResolveInfo $info) {
                $method = 'resolve' . ucfirst($info->fieldName);
                if (method_exists($this, $method)) {
                    return $this->{$method}($comment, $args, $context, $info);
                }

                return $comment->{$info->fieldName};
            }
        ];

        parent::__construct($config);
    }

    /**
     * @param $comment
     * @param $args
     * @param $context
     * @param $info
     * @return User|null
     */
    public function resolveAuthor(Comment $comment, $args, $context, $info): ?User
    {
        return DataSource::findUser($comment->authorId);
    }

    /**
     * @param $comment
     * @param $args
     * @param $context
     * @param $info
     * @return Comment|null
     */
    public function resolveParent(Comment $comment, $args, $context, $info): ?Comment
    {
        if ($comment->parentId) {
            return DataSource::findComment($comment->parentId);
        }

        return null;
    }

    /**
     * @param Comment $comment
     * @param $args
     * @return array
     */
    public function resolveReplies(Comment $comment, $args): array
    {
        return DataSource::findReplies($comment->id, $args['limit']);
    }

    /**
     * @param Comment $comment
     * @return int
     */
    public function resolveTotalReplyCount(Comment $comment): int
    {
        return DataSource::countReplies($comment->id);
    }
}