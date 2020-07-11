<?php
declare(strict_types=1);

namespace App\graphql\blog\Blog\Data;

/**
 * Class Story
 * @package App\graphql\blog\Blog\Data
 */
class Story
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $authorId;

    /**
     * @var string
     */
    public $body;

    /**
     * Story constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->authorId = $data['authorId'];
        $this->body = $data['body'];
    }
}
