<?php

declare(strict_types=1);

namespace App\CQRS\Query;

use App\CQRS\Domain\PostViewRepository;

class PostQuery
{
    /**
     * @var PostViewRepository
     */
    private $postViewRepository;

    /**
     * PostQuery constructor.
     * @param PostViewRepository $postViewRepository
     */
    public function __construct(PostViewRepository $postViewRepository)
    {
        $this->postViewRepository = $postViewRepository;
    }

    /**
     * @param int $id
     */
    public function getPostById(int $id)
    {
        $post = $this->postViewRepository->findById($id);
    }
}