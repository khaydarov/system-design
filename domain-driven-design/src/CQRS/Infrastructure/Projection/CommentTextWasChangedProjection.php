<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Projection;

use App\CQRS\Domain\CommentTextWasChanged;
use App\CQRS\Domain\CommentWasCreated;
use Aura\Sql\ExtendedPdo;

/**
 * Class CommentTextWasChangedProjection
 * @package App\CQRS\Infrastructure\Projection
 */
class CommentTextWasChangedProjection implements Projection
{
    /**
     * @var ExtendedPdo
     */
    private $pdo;

    /**
     * CommentTextWasChangedProjection constructor.
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
        return CommentTextWasChanged::class;
    }

    /**
     * @param CommentTextWasChanged $event
     */
    public function project($event)
    {
        $this->pdo->fetchOne(
            "UPDATE comments SET text = :text WHERE id = :id",
            [
                'id' => $event->getCommentId()->getValue(),
                'text' => $event->getText()
            ]
        );
    }
}