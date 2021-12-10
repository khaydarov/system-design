<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Projection;

use App\CQRS\Domain\PostContentWasChanged;
use App\CQRS\Domain\PostTitleWasChanged;
use Aura\Sql\ExtendedPdo;

/**
 * Class PostWasCreatedProjection
 * @package App\CQRS\Infrastructure\Projection
 */
class PostTitleWasChangedProjection implements Projection
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
        return PostTitleWasChanged::class;
    }

    /**
     * @param PostTitleWasChanged $event
     */
    public function project($event): void
    {
        $this->pdo->fetchAffected("UPDATE posts SET title = :title WHERE id = :id", [
            'id' => $event->getAggregateId()->getValue(),
            'title' => $event->getTitle()
        ]);
    }
}