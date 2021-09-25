<?php

declare(strict_types=1);

namespace App\Example\User\Ui\Web\Controller;

use App\Example\Shared\Infrastructure\WebController;
use App\Example\User\Application\UserCreate\UserCreateCommand;
use Symfony\Component\HttpFoundation\Request;

class UserController extends WebController
{
    public function index(Request $request)
    {
        $name = $request->query->get('name');
        $email = $request->query->get('email');

        $command = new UserCreateCommand($name, $email);
        $this->commandBus->command($command);
    }
}