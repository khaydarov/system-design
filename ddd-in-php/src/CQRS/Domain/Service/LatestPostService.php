<?php

declare(strict_types=1);

namespace App\CQRS\Domain\Service;

use App\CQRS\Domain\PostRepository;

class LatestPostService
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var PostSpecificationFactory
     */
    private $postSpecificationFactory;

    /**
     * LatestPostService constructor.
     * @param PostRepository $postRepository
     * @param PostSpecificationFactory $postSpecificationFactory
     */
    public function __construct(PostRepository $postRepository, PostSpecificationFactory $postSpecificationFactory)
    {
        $this->postRepository = $postRepository;
        $this->postSpecificationFactory = $postSpecificationFactory;
    }

    public function execute($request)
    {
        $posts = $this->postRepository->query(
            $this->postSpecificationFactory->createLatestPost($request->since)
        );

        return $posts;
    }
}