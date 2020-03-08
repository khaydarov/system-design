<?php
declare(strict_types=1);

namespace App\Additional\Repository;

/**
 * Class PostRepository
 * @package App\Additional\Repository
 */
class PostRepository
{
    private $persistence;

    public function __construct(Persistence $persistence)
    {
        $this->persistence = $persistence;
    }

    public function generateId(): PostId
    {
        return PostId::fromInt($this->persistence->generateId());
    }

    public function findById(PostId $id): Post
    {
        try {
            $array_data = $this->persistence->retrieve($id->toInt());
        } catch (\OutOfBoundsException $e) {
            throw new \OutOfBoundsException($e->getMessage());
        }

        return Post::fromState($array_data);
    }

    public function save(Post $post)
    {
        $this->persistence->persist([
            'id' => $post->getId()->toInt(),
            'statusId' => $post->getStatus()->toInt(),
            'text' => $post->getText(),
            'title' => $post->getTitle()
        ]);
    }
}