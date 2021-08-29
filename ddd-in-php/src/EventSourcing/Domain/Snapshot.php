<?php

declare(strict_types=1);

namespace App\EventSourcing\Domain;

/**
 * Class Snapshot
 * @package App\EventSourcing
 */
class Snapshot
{
    /**
     * @var int
     */
    private $version;

    /**
     * @var array
     */
    private $metadata;

    /**
     * Snapshot constructor.
     * @param $version
     * @param $metadata
     */
    public function __construct($version, $metadata)
    {
        $this->version = $version;
        $this->metadata = $metadata;
    }

    /**
     * @return Post
     */
    public function aggregate(): Post
    {
        $post = Post::reconstitute(
            new EventStream($this->metadata['id'], $this->metadata['data'])
        );

        return $post;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }
}