<?php
declare(strict_types=1);

namespace App\Behavioral\Iterator\Example1;

/**
 * Class Book
 * @package App\Behavioral\Iterator\Example1
 */
class Book
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    public function __construct(string $title, string $author)
    {
        $this->title = $title;
        $this->author = $author;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthorAndTitle(): string
    {
        return sprintf("%s by %s", $this->title, $this->author);
    }
}