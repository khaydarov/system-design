<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Data;

class DataSource
{
    private static $users = [];
    private static $stories = [];
    private static $storyLikes = [];
    private static $comments = [];
    private static $storyComments = [];
    private static $commentReplies = [];
    private static $storyMentions = [];

    public static function init()
    {
        self::$users = [
            '1' => new User([
                'id' => '1',
                'name' => 'John',
                'email' => 'john@example.com',
                'photo' => new Image([
                    'uuid' => '100',
                    'width' => '120',
                    'height' => '120'
                ])
            ]),
            '2' => new User([
                'id' => '2',
                'name' => 'Jane',
                'email' => 'jane@example.com',
                'photo' => new Image([
                    'uuid' => '200',
                    'width' => '120',
                    'height' => '120'
                ])
            ]),
            '3' => new User([
                'id' => '3',
                'name' => 'Doe',
                'email' => 'john@example.com',
                'photo' => new Image([
                    'uuid' => '300',
                    'width' => '120',
                    'height' => '120'
                ])
            ]),
        ];

        self::$stories = [
            '1' => new Story(['id' => '1', 'authorId' => '1', 'body' => '<h1>GraphQL is awesome!</h1>']),
            '2' => new Story(['id' => '2', 'authorId' => '1', 'body' => '<a>Test this</a>']),
            '3' => new Story(['id' => '3', 'authorId' => '3', 'body' => "This\n<br>story\n<br>spans\n<br>newlines"]),
        ];

        self::$storyLikes = [
            '1' => ['1', '2', '3'],
            '2' => [],
            '3' => ['1']
        ];

        self::$comments = [
            // thread #1:
            '100' => new Comment(['id' => '100', 'authorId' => '3', 'storyId' => '1', 'body' => 'Likes']),
            '110' => new Comment(['id' =>'110', 'authorId' =>'2', 'storyId' => '1', 'body' => 'Reply <b>#1</b>', 'parentId' => '100']),
            '111' => new Comment(['id' => '111', 'authorId' => '1', 'storyId' => '1', 'body' => 'Reply #1-1', 'parentId' => '110']),
            '112' => new Comment(['id' => '112', 'authorId' => '3', 'storyId' => '1', 'body' => 'Reply #1-2', 'parentId' => '110']),
            '113' => new Comment(['id' => '113', 'authorId' => '2', 'storyId' => '1', 'body' => 'Reply #1-3', 'parentId' => '110']),
            '114' => new Comment(['id' => '114', 'authorId' => '1', 'storyId' => '1', 'body' => 'Reply #1-4', 'parentId' => '110']),
            '115' => new Comment(['id' => '115', 'authorId' => '3', 'storyId' => '1', 'body' => 'Reply #1-5', 'parentId' => '110']),
            '116' => new Comment(['id' => '116', 'authorId' => '1', 'storyId' => '1', 'body' => 'Reply #1-6', 'parentId' => '110']),
            '117' => new Comment(['id' => '117', 'authorId' => '2', 'storyId' => '1', 'body' => 'Reply #1-7', 'parentId' => '110']),
            '120' => new Comment(['id' => '120', 'authorId' => '3', 'storyId' => '1', 'body' => 'Reply #2', 'parentId' => '100']),
            '130' => new Comment(['id' => '130', 'authorId' => '3', 'storyId' => '1', 'body' => 'Reply #3', 'parentId' => '100']),
            '200' => new Comment(['id' => '200', 'authorId' => '2', 'storyId' => '1', 'body' => 'Me2']),
            '300' => new Comment(['id' => '300', 'authorId' => '3', 'storyId' => '1', 'body' => 'U2']),

            # thread #2:
            '400' => new Comment(['id' => '400', 'authorId' => '2', 'storyId' => '2', 'body' => 'Me too']),
            '500' => new Comment(['id' => '500', 'authorId' => '2', 'storyId' => '2', 'body' => 'Nice!']),
        ];

        self::$storyComments = [
            '1' => ['100', '110', '200', '300'],
            '2' => ['400', '500']
        ];

        self::$commentReplies = [
            '100' => ['110', '120', '130'],
            '110' => ['111', '112', '113', '114', '115', '116', '117'],
        ];

//        self::$storyMentions = [
//            '1' => [
//                self::$users['2']
//            ],
//            '2' => [
//                self::$stories['1'],
//                self::$users['3']
//            ]
//        ];
    }

    /**
     * @param string $id
     * @return User|null
     */
    public static function findUser(string $id): ?User
    {
        return self::$users[$id] ?? null;
    }

    /**
     * @param $id
     * @return Story|null
     */
    public static function findStory($id): ?Story
    {
        return self::$stories[$id] ?? null;
    }

    /**
     * @param $limit
     * @param null $afterId
     * @return array
     */
    public static function findStories($limit, $afterId = null): array
    {
        $start = $afterId ? (int) array_search($afterId, array_keys(self::$stories)) + 1 : 0;
        return array_slice(array_values(self::$stories), $start, $limit);
    }

    /**
     * @return Story
     */
    public static function findLatestStory(): Story
    {
        return array_pop(self::$stories);
    }

    /**
     * @param $id
     * @return Comment|null
     */
    public static function findComment($id): ?Comment
    {
        return self::$comments[$id] ?? null;
    }

    /**
     * @param $storyId
     * @param int $limit
     * @param null $afterId
     * @return array
     */
    public static function findComments($storyId, $limit = 5, $afterId = null): array
    {
        $storyComments = self::$storyComments[$storyId] ?? [];

        $start = isset($afterId) ? (int) array_search($afterId, $storyComments) + 1 : 0;
        $storyComments = array_slice($storyComments, $start, $limit);

        return array_map(
            function ($commentId) {
                return self::$comments[$commentId];
            },
            $storyComments
        );
    }

    /**
     * @param $storyId
     * @return int
     */
    public static function countComments($storyId): int
    {
        return count(self::$storyComments[$storyId] ?? []);
    }

    /**
     * @param $authorId
     * @return Story|null
     */
    public static function findLastStoryFor($authorId): ?Story
    {
        $storiesFound = array_filter(self::$stories, function (Story $story) use ($authorId) {
            return $story->authorId === $authorId;
        });

        return array_pop($storiesFound);
    }

    /**
     * @param $commentId
     * @param int $limit
     * @return array
     */
    public static function findReplies($commentId, $limit = 5): array
    {
        $commentReplies = self::$commentReplies[$commentId] ?? [];
        $commentReplies = array_slice($commentReplies, 0, $limit);

        return array_map(
            function ($replyId) {
                return self::$comments[$replyId];
            },
            $commentReplies
        );
    }

    /**
     * @param $commentId
     * @return int
     */
    public static function countReplies($commentId): int
    {
        return count(self::$commentReplies[$commentId] ?? []);
    }

    /**
     * @param $storyId
     * @param $limit
     * @return array
     */
    public static function findLikes($storyId, $limit): array
    {
        $likes = isset(self::$storyLikes[$storyId]) ? self::$storyLikes[$storyId] : [];
        $result = array_map(
            function ($userId) {
                return self::$users[$userId];
            },
            $likes
        );
        return array_slice($result, 0, $limit);
    }

    /**
     * @param $storyId
     * @param $userId
     * @return bool
     */
    public static function isLikedBy($storyId, $userId): bool
    {
        $subscribers = self::$storyLikes[$storyId] ?? [];
        return in_array($userId, $subscribers);
    }
//
//    public static function findStoryMentions($storyId)
//    {
//        return isset(self::$storyMentions[$storyId]) ? self::$storyMentions[$storyId] :[];
//    }
}
