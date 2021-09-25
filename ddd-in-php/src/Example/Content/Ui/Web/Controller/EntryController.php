<?php

declare(strict_types=1);

namespace App\Example\Content\Ui\Web\Controller;

use App\Example\Content\Application\EntryCreate\EntryCreateCommand;
use App\Example\Content\Application\FindByCreator\FindByCreatorIdQuery;
use App\Example\Shared\Infrastructure\WebController;
use App\Example\User\Application\UserCreate\UserCreateCommand;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EntryController
 * @package App\Example\Content\Ui\Web\Controller
 */
class EntryController extends WebController
{
    public function getEntriesByCreatorId(Request $request)
    {
        $creatorId = $request->query->getInt('creatorId');
        $query = new FindByCreatorIdQuery($creatorId);
        $this->queryBus->ask($query);
    }

    /**
     * @param Request $request
     * @param int|null $id
     * @return JsonResponse
     */
    public function postEntry(Request $request, ?int $id): JsonResponse
    {
        $userId = $request->query->getInt('userId');
        $content = $request->query->get('content');

        $command = new EntryCreateCommand($userId, $content);
        $this->commandBus->command($command);

        return new JsonResponse([
            'id' => $id,
            'data' => [
                'id' => $id,
            ]
        ]);
    }
}