<?php

declare(strict_types=1);

namespace App\CQRS\Command;

use App\CQRS\Domain\PostRepository;
use App\CQRS\Infrastructure\Persistence\EventStore;
use App\CQRS\Infrastructure\Projection\AsyncProjector;
use App\CQRS\Infrastructure\Projection\PostWasCreatedProjection;
use App\CQRS\Infrastructure\Projection\Projector;
use App\CQRS\Domain\Post;
use App\CQRS\Domain\PostContentWasChanged;
use App\CQRS\Domain\PostId;
use App\CQRS\Domain\PostTitleWasChanged;
use App\CQRS\Domain\PostWasCreated;
use App\EventSourcing\Serializer;
use App\EventSourcing\SnapshotRepository;

/**
 * Class PostCommand
 * @package App\CQRS\Application
 */
class PostCommand
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostCommand constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Creates new Post
     */
    public function createPost()
    {
        $post = Post::writeNewFrom('title', 'content');
        $this->postRepository->save($post);
    }

    /**
     * Updates existed Post
     *
     * @param int $id
     */
    public function updatePost(int $id)
    {
        $post = $this->postRepository->findById(
            PostId::fromValue($id)
        );

        $post->changeTitleFor('new title');
        $this->postRepository->save($post);
    }
}