<?php

use App\Example\User\Ui\Web\Controller\UserController;

return [
    ['GET', '/users', [UserController::class, 'index']]
];