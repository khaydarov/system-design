<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Comment;

interface CommentRepository
{
    /**
     * @param Comment $comment
     * @return mixed
     */
    public function store(Comment &$comment);

    /**
     * @param CommentId $commentId
     * @return Comment|null
     */
    public function findById(CommentId $commentId): ?Comment;
}