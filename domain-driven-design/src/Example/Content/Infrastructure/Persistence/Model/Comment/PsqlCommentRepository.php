<?php

declare(strict_types=1);

namespace App\Example\Content\Infrastructure\Persistence\Model\Comment;

use App\Example\Content\Domain\Model\Comment\Comment;
use App\Example\Content\Domain\Model\Comment\CommentId;
use App\Example\Content\Domain\Model\Comment\CommentRepository;
use App\Example\Content\Domain\Model\Entry\EntryId;
use Aura\Sql\ExtendedPdo;

class PsqlCommentRepository implements CommentRepository
{
    /**
     * @var ExtendedPdo
     */
    private $pdo;

    /**
     * PsqlCommentRepositry constructor.
     * @param ExtendedPdo $pdo
     */
    public function __construct(ExtendedPdo $pdo)
    {
        $this->pdo = $pdo;
    }

    public function store(Comment &$comment)
    {
        $data = $this->pdo->fetchOne(
            "INSERT INTO comments (entry_id, text) VALUES(:entry_id, :text) RETURNING *",
            [
                'entry_id' => $comment->getEntryId()->getValue(),
                'text' => $comment->getText()
            ]
        );

        $comment = Comment::fromValues(
            CommentId::fromValue($data['id']),
            $comment->getEntryId(),
            $comment->getText()
        );
    }

    /**
     * @param CommentId $commentId
     * @return Comment|null
     */
    public function findById(CommentId $commentId): ?Comment
    {
        $data = $this->pdo->fetchOne(
            "SELECT * FROM comments WHERE id = :id",
            [
                'id' => $commentId->getValue()
            ]
        );

        if (empty($data)) {
            return null;
        }

        return Comment::fromValues(
            CommentId::fromValue($data['id']),
            EntryId::fromValue($data['entry_id']),
            $data['text']
        );
    }
}