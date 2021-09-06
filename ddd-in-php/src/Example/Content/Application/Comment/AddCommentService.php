<?php

declare(strict_types=1);

namespace App\Example\Content\Application\Comment;

use App\Example\Content\Domain\Model\Comment\Comment;
use App\Example\Content\Domain\Model\Comment\CommentId;
use App\Example\Content\Domain\Model\Comment\CommentRepository;
use App\Example\Content\Domain\Model\Entry\EntryId;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddCommentService
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var EntryRepository
     */
    private $entryRepository;

    /**
     * AddCommentService constructor.
     * @param CommentRepository $commentRepository
     */
    public function __construct(CommentRepository $commentRepository, EntryRepository $entryRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->entryRepository = $entryRepository;
    }

    public function execute(int $entryId, string $text): ?Comment
    {
        $entry = $this->entryRepository->findById(EntryId::fromValue($entryId));
        if ($entry === null) {
            return null;
        }

        $comment = new Comment(CommentId::fromValue(0), $entry->getId(), $text);
        $this->commentRepository->store($comment);

        return $comment;
    }
}