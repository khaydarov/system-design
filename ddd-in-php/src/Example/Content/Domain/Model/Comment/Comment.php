<?php

declare(strict_types=1);

namespace App\Example\Content\Domain\Model\Comment;

use App\Example\Content\Domain\Model\Entry\EntryId;
use App\Example\Shared\Domain\AggregateRoot;

class Comment extends AggregateRoot
{
    /**
     * @var CommentId
     */
    private $id;

    /**
     * @var EntryId
     */
    private $entryId;

    /**
     * @var string
     */
    private $text;

    /**
     * Comment constructor.
     * @param CommentId $commentId
     * @param EntryId $entryId
     * @param string $text
     */
    public function __construct(CommentId $commentId, EntryId $entryId, string $text)
    {
        $this->id = $commentId;
        $this->entryId = $entryId;
        $this->text = $text;
    }

    public function getId(): CommentId
    {
        return $this->id;
    }

    public function getEntryId(): EntryId
    {
        return $this->entryId;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function changeText(string $newText)
    {
        $this->text = $newText;
    }

    /**
     * @param CommentId $commentId
     * @param EntryId $entryId
     * @param string $text
     * @return Comment
     */
    public static function fromValues(CommentId $commentId, EntryId $entryId, string $text): Comment
    {
        return new Comment($commentId, $entryId, $text);
    }
}