<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Data;

/**
 * Class Comment
 * @package App\graphql\blog\Blog\Data
 */
class Comment
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $authorId;

    /**
     * @var string
     */
    public $storyId;

    /**
     * @var string
     */
    public $parentId;

    /**
     * @var string
     */
    public $body;

    /**
     * @var boolean
     */
    public $isAnonymous;

    /**
     * Comment constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->authorId = $data['authorId'];
        $this->storyId = $data['storyId'];
        $this->parentId = $data['parentId'] ?? 0;
        $this->body = $data['body'];
        $this->isAnonymous = $data['isAnonymous'] ?? false;
    }
}