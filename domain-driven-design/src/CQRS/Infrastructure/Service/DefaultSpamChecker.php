<?php

declare(strict_types=1);

namespace App\CQRS\Infrastructure\Service;

use App\CQRS\Domain\Comment;
use App\CQRS\Domain\Model\SpamChecker;

class DefaultSpamChecker implements SpamChecker
{
    public function execute(Comment $comment): bool
    {
        $text = $comment->getText();

        return $text === 'spam';
    }
}