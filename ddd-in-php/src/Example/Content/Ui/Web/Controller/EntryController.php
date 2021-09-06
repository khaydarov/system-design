<?php

declare(strict_types=1);

namespace App\Example\Content\Ui\Web\Controller;

use App\Example\Content\Application\Comment\AddCommentService;
use App\Example\Content\Application\Entry\AddEntryService;
use App\Example\Content\Application\Entry\EditEntryService;
use App\Example\Content\Domain\Model\Comment\Comment;
use App\Example\Content\Domain\Model\Comment\CommentId;
use App\Example\Content\Domain\Model\Comment\CommentRepository;
use App\Example\Content\Domain\Model\Entry\EntryId;
use App\Example\Content\Domain\Model\Entry\EntryRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EntryController
 * @package App\Example\Content\Ui\Web\Controller
 */
class EntryController
{
    /**
     * @var EntryRepository
     */
    private $entryRepository;

    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * EntryController constructor.
     * @param EntryRepository $entryRepository
     */
    public function __construct(EntryRepository $entryRepository, CommentRepository $commentRepository)
    {
        $this->entryRepository = $entryRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getEntry(int $id): JsonResponse
    {
        $entry = $this->entryRepository->findById(EntryId::fromValue($id));

        if ($entry === null) {
            return new JsonResponse([], 404);
        }

        return new JsonResponse([
            'id' => $id,
            'data' => [
                'id' => $id,
                'content' => $entry->getContent()
            ]
        ]);
    }

    /**
     * @param Request $request
     * @param int|null $id
     * @return JsonResponse
     */
    public function postEntry(Request $request, ?int $id): JsonResponse
    {
        // add validation
        $content = $request->query->get('content', '');
        if ($id === null) {
            $addEntryService = new AddEntryService($this->entryRepository);
            $entry = $addEntryService->execute($content);
        } else {
            $editEntryService = new EditEntryService($this->entryRepository);
            $entry = $editEntryService->execute($id, $content);
        }

        return new JsonResponse([
            'id' => $id,
            'data' => [
                'id' => $id,
                'content' => $entry->getContent()
            ]
        ]);
    }

    /**
     * @param Request $request
     * @param int|null $id
     * @return JsonResponse
     */
    public function postComment(Request $request, ?int $id): JsonResponse
    {
        $addCommentService = new AddCommentService(
            $this->commentRepository,
            $this->entryRepository
        );

        $comment = $addCommentService->execute($id, $request->query->get('text'));

        return new JsonResponse([
            'id' => $comment->getId()->getValue(),
            'data' => [
                'id' => $comment->getId()->getValue(),
                'text' => $comment->getText()
            ]
        ]);
    }
}