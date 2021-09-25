<?php

use App\Example\Content\Ui\Web\Controller\EntryController;
use App\Example\Content\Ui\Web\Controller\MainController;

return [
    ['GET', '/', [MainController::class, 'index']],
    ['GET', '/entry', [EntryController::class, 'getEntriesByCreatorId']],
    ['POST', '/entry[/{id}]', [EntryController::class, 'postEntry']],
    ['GET', '/entry/{id}/comments', [EntryController::class, 'postComment']],
];