<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem;

final class ReservationDetails
{
    /**
     * @var string
     */
    private $barCode;

    /**
     * @var bool
     */
    private $borrowed;

    /**
     * @var null|\DateTimeImmutable
     */
    private $dueDate;

    /**
     * @var int
     */
    private $memberId;

    public function __construct(
        string $barCode,
        bool $borrowed,
        ?\DateTimeImmutable $dueDate,
        int $memberId
    ) {
        $this->barCode = $barCode;
        $this->borrowed = $borrowed;
        $this->dueDate = $dueDate;
        $this->memberId = $memberId;
    }

    /**
     * @return string
     */
    public function getBarCode(): string
    {
        return $this->barCode;
    }

    /**
     * @return bool
     */
    public function isBorrowed(): bool
    {
        return $this->borrowed;
    }

    /**
     * @return null|\DateTimeImmutable
     */
    public function getDueDate(): ?\DateTimeImmutable
    {
        return $this->dueDate;
    }

    /**
     * @return int
     */
    public function getMemberId(): int
    {
        return $this->memberId;
    }
}