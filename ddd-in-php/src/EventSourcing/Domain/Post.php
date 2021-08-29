<?php

declare(strict_types=1);

namespace App\EventSourcing\Domain;

use \App\CQRS\Domain\Post as BasePost;

class Post extends BasePost implements EventSourceAggregateRoot
{
    /**
     * @param EventStream $history
     * @return static
     */
    public static function reconstitute(EventStream $history): self
    {
        $post = new static($history->getAggregateId());

        foreach ($history->getEvents() as $event) {
            $post->applyThat($event);
        }

        return $post;
    }
}