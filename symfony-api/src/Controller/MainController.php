<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\AbstractComparison;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\IdenticalTo;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotEqualTo;
use Symfony\Component\Validator\Constraints\NotIdenticalTo;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class MainController extends AbstractController
{
    public function index(TranslatorInterface $translator, ValidatorInterface $validator): JsonResponse
    {
        $user = new User(1, 'Bob');
        $errors = $validator->validate($user, [
            new IdenticalTo("Bob"),
        ]);

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