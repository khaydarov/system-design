<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Comment;

class CommentId
{
    /**
     * @var int
     */
    private $value;

    /**
     * CommentId constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @param int $id
     * @return CommentId
     */
    public static function fromValue(int $id): CommentId
    {
        return new CommentId($id);
    }
}