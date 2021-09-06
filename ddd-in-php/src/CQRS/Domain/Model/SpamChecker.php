<?php

declare(strict_types=1);

namespace App\CQRS\Domain\Model;

use App\CQRS\Domain\Comment;

interface SpamChecker
{
    public function execute(Comment $comment): bool;
}