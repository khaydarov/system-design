<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem;

use App\LibraryManagementSystem\Account\Member;

final class BookItem extends Book
{
    /**
     * @var string
     */
    private $barCode;

    /**
     * @var Rack
     */
    private $placedAt;

    /**
     * @var BookStatus
     */
    private $status;

    /**
     * @var BookFormat
     */
    private $format;

    /**
     * @var int
     */
    private $price;

    public function __construct(
        string $isbn,
        string $title,
        string $subject,
        string $publisher,
        string $language,
        int $numberOfPages,
        string $barCode,
        Rack $placedAt,
        BookStatus $bookStatus,
        BookFormat $bookFormat,
        int $price
    ) {
        parent::__construct($isbn, $title, $subject, $publisher, $language, $numberOfPages);

        $this->barCode = $barCode;
        $this->placedAt = $placedAt;
        $this->status = $bookStatus;
        $this->format = $bookFormat;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getBarCode(): string
    {
        return $this->barCode;
    }

    /**
     * @return Rack
     */
    public function getPlacedAt(): Rack
    {
        return $this->placedAt;
    }

    /**
     * @return BookStatus
     */
    public function getStatus(): BookStatus
    {
        return $this->status;
    }

    /**
     * @return BookFormat
     */
    public function getFormat(): BookFormat
    {
        return $this->format;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->getStatus()->getValue() === BookStatus::AVAILABLE;
    }

    /**
     * @param Member $member
     * @throws \Exception
     */
    public function checkOut(Member $member)
    {
        if (!$this->isAvailable()) {
            throw new \Exception("This book is not available");
        }

        $this->status = BookStatus::loaned();
    }
}