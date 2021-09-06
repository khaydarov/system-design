<?php

declare(strict_types=1);

namespace App\Example\Content\Ui\Web\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    public function index(Request $request)
    {
        return new JsonResponse(['text' => $request->query->get('text')], 200);
    }
}