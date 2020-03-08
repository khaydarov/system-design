<?php
declare(strict_types=1);

use App\Additional\Repository\InMemoryPersistence;
use App\Additional\Repository\Post;
use App\Additional\Repository\PostId;
use App\Additional\Repository\PostRepository;
use App\Additional\Repository\PostStatus;
use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{
    /**
     * @var PostRepository
     */
    private $repository;

    protected function setUp(): void
    {
        $this->repository = new PostRepository(new InMemoryPersistence());
    }

    public function testCanGenerateId()
    {
        $this->assertEquals(1, $this->repository->generateId()->toInt());
    }

    public function testThrowsException()
    {
        $this->expectException(OutOfBoundsException::class);
        $this->repository->findById(PostId::fromInt(42));
    }

    public function testCanPersistPostDraft()
    {
        $post_id = $this->repository->generateId();
        $post = Post::draft($post_id, 'Repository pattern', 'Design Patterns PHP');
        $this->repository->save($post);

        $this->repository->findById($post_id);

        $this->assertEquals($post_id, $this->repository->findById($post_id)->getId());
        $this->assertEquals(PostStatus::STATE_DRAFT, $post->getStatus()->toString());
    }
}