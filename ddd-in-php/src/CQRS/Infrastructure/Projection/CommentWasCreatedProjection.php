<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Projection;

use App\CQRS\Domain\CommentWasCreated;
use Aura\Sql\ExtendedPdo;

/**
 * Class CommentWasCreatedProjection
 * @package App\CQRS\Infrastructure\Projection
 */
class CommentWasCreatedProjection implements Projection
{
    /**
     * @var ExtendedPdo
     */
    private $pdo;

    /**
     * CommentWasCreatedProjection constructor.
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
        return CommentWasCreated::class;
    }

    /**
     * @param CommentWasCreated $event
     */
    public function project($event)
    {
        $this->pdo->fetchOne(
            "INSERT INTO comments (id, post_id, created_at, content)
                        VALUES (:id, :post_id, :created_at, :content)",
            [
                'id' => $event->getAggregateId()->getValue(),
                'post_id' => $event->getPostId()->getValue(),
                'created_at' => ($event->occurredOn())->format('Y-m-d H:m:s'),
                'content' => $event->getText()
            ]
        );
    }
}