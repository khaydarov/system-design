<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Translation\TranslatorInterface;

class MainController extends AbstractController
{
    public function index(TranslatorInterface $translator): JsonResponse
    {
        return $this->json([
            'message' => sprintf(
                '%s %s %s',
                $translator->trans('Hello!'),
                $translator->trans('Symfony is great!'),
                $translator->trans('sdfsf')
            )
        ]);
    }
}