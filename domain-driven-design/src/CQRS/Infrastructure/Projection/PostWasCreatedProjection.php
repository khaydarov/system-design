<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Projection;

use App\CQRS\Domain\PostWasCreated;
use Aura\Sql\ExtendedPdo;

/**
 * Class PostWasCreatedProjection
 * @package App\CQRS\Infrastructure\Projection
 */
class PostWasCreatedProjection implements Projection
{
    /**
     * @var ExtendedPdo
     */
    private $pdo;

    /**
     * PostWasCreatedProjection constructor.
     * @param ExtendedPdo $pdo
     */
    public function __construct(ExtendedPdo $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return string
     */
    public function listensTo(): string
    {
        return PostWasCreated::class;
    }

    /**
     * @param PostWasCreated $event
     */
    public function project($event): void
    {
        $this->pdo->fetchOne(
            "INSERT INTO posts (id, title, content, created_at, is_published)
                            VALUES (:id, :title, :content, :created_at, :is_published)",
            [
                'id' => $event->getAggregateId()->getValue(),
                'title' => $event->getTitle(),
                'content' => $event->getContent(),
                'created_at' => ($event->occurredOn())->format('Y-m-d H:m:s'),
                'is_published' => false
            ]
        );
    }
}