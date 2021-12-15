<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem;

abstract class Book
{
    /**
     * @var string
     */
    private $isbn;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $publisher;

    /**
     * @var string
     */
    private $language;

    /**
     * @var int
     */
    private $numberOfPages;

    public function __construct(
        string $isbn,
        string $title,
        string $subject,
        string $publisher,
        string $language,
        int $numberOfPages
    ) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->subject = $subject;
        $this->publisher = $publisher;
        $this->language = $language;
        $this->numberOfPages = $numberOfPages;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getPublisher(): string
    {
        return $this->publisher;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return int
     */
    public function getNumberOfPages(): int
    {
        return $this->numberOfPages;
    }
}