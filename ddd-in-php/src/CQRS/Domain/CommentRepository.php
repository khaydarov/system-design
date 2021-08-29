<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Interface CommentRepository
 * @package App\CQRS\Domain
 */
interface CommentRepository
{
    /**
     * @param Comment $comment
     * @return mixed
     */
    public function save(Comment $comment);

    /**
     * @param CommentId $comentId
     * @return Comment|null
     */
    public function findById(CommentId $commentId): ?Comment;
}