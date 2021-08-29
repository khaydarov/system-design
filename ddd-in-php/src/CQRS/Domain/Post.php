<?php

declare(strict_types=1);

namespace App\CQRS\Domain;

/**
 * Class Post
 * @package App\CQRS\Domain
 */
class Post extends AggregateRoot
{
    /**
     * @var PostId
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var bool
     */
    private $published = false;

    /**
     * Post constructor.
     * @param PostId $id
     */
    public function __construct(AggregateId $id)
    {
        $this->id = $id;
    }

    /**
     * @return PostId
     */
    public function getId(): PostId
    {
        return $this->id;
    }

    /**
     * @param string $title
     * @param string $content
     *
     * @return static
     */
    public static function writeNewFrom(string $title, string $content): self
    {
        $id = PostId::generate();
        $post = new static($id);
        $post->recordApplyAndPublishThat(
            new PostWasCreated($id, new \DateTimeImmutable(), $title, $content)
        );

        return $post;
    }

    public function publish(): void
    {
        $this->recordApplyAndPublishThat(
            new PostWasPublished(new \DateTimeImmutable())
        );
    }

    public function changeContentFor(string $newContent): void
    {
        $this->recordApplyAndPublishThat(
            new PostContentWasChanged($this->id, new \DateTimeImmutable(), $newContent)
        );
    }

    public function changeTitleFor(string $newTitle): void
    {
        $this->recordApplyAndPublishThat(
            new PostTitleWasChanged($this->id, new \DateTimeImmutable(), $newTitle)
        );
    }

    /**
     * @param PostWasCreated $event
     */
    protected function applyPostWasCreated(PostWasCreated $event)
    {
        $this->title = $event->getTitle();
        $this->content = $event->getContent();
    }

    /**
     * @param PostWasPublished $event
     */
    protected function applyPostWasPublished(PostWasPublished $event)
    {
        $this->published = true;
    }

    /**
     * @param PostTitleWasChanged $event
     */
    protected function applyPostTitleWasChanged(PostTitleWasChanged $event)
    {
        if ($event->getPostId()->getValue() === $this->id->getValue()) {
            $this->title = $event->getTitle();
        }
    }

    /**
     * @param PostContentWasChanged $event
     */
    protected function applyPostContentWasChanged(PostContentWasChanged $event)
    {
        if ($event->getPostId()->getValue() === $this->id->getValue()) {
            $this->content = $event->getContent();
        }
    }

    public static function reconstitute(EventStream $stream): self
    {
        $post = new static($stream->getAggregateId());

        foreach ($stream->getEvents() as $event) {
            $post->applyThat($event);
        }

        return $post;
    }
}