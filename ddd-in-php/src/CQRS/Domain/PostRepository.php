<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Interface PostRepository
 * @package App\CQRS\Domain
 */
interface PostRepository
{
    /**
     * @param Post $post
     * @return mixed
     */
    public function save(Post $post);

    /**
     * @param PostId $postId
     * @return Post|null
     */
    public function findById(PostId $postId): ?Post;
}