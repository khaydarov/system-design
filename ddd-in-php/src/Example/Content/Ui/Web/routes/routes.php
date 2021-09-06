<?php

use App\Example\Content\Ui\Web\Controller\EntryController;
use App\Example\Content\Ui\Web\Controller\MainController;

return [
    ['GET', '/', [MainController::class, 'index']],
    ['GET', '/entry[/{id}]', [EntryController::class, 'getEntry']],
    ['GET', '/entry/{id}/comments', [EntryController::class, 'postComment']]
];