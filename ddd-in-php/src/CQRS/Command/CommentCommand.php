<?php

declare(strict_types=1);

namespace App\CQRS\Command;

use App\CQRS\Domain\Comment;
use App\CQRS\Domain\CommentId;
use App\CQRS\Domain\CommentRepository;
use App\CQRS\Domain\PostId;
use App\CQRS\Domain\PostRepository;
use App\CQRS\Infrastructure\Service\DefaultSpamChecker;

class CommentCommand
{
    private $postRepository;
    private $commentRepository;

    public function __construct(PostRepository $postRepository, CommentRepository $commentRepository)
    {
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    public function createComment()
    {
        $post = $this->postRepository->findById(PostId::fromValue(10));
        $comment = Comment::writeNewFrom($post->getId(), 'comment2');

        $this->commentRepository->save($comment);
    }

    public function updateComment($id)
    {
        $post = $this->postRepository->findById(PostId::fromValue(10));
        $post->changeTitleFor('bbb');
        $this->postRepository->save($post);

        $comment = $this->commentRepository->findById(CommentId::fromValue($id));
        $spamChcker = new DefaultSpamChecker();
        if ($spamChcker->execute($comment)) {
            throw new \Exception('comment text is marked as spam');
        }

        $comment->changeText('updated text');

        $this->commentRepository->save($comment);
    }
}