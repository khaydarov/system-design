<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem\Account;

use App\LibraryManagementSystem\BookItem;
use App\LibraryManagementSystem\BookReservation;

final class Member extends Account
{
    /**
     * @var \DateTimeImmutable
     */
    private $dateOfMembership;

    /**
     * @var int
     */
    private $totalBooksCheckedOut;

    public function __construct(
        int $id,
        Person $person,
        \DateTimeImmutable $dateOfMembership,
        int $totalBooksCheckedOut
    ) {
        parent::__construct($id, $person);

        $this->dateOfMembership = $dateOfMembership;
        $this->totalBooksCheckedOut = $totalBooksCheckedOut;
    }

    /**
     * @param BookItem $bookItem
     * @param BookReservation $bookReservation
     *
     * @throws \Exception
     */
    public function reserveBookItem(BookItem $bookItem, BookReservation $bookReservation): void
    {
        if (!$bookItem->isAvailable()) {
            throw new \Exception('Book is not available');
        }

        $reservationDetails = $bookReservation->fetchReservationDetails($bookItem->getBarCode());
        if ($reservationDetails->isBorrowed() && $reservationDetails->getMemberId() === $this->getId()) {
            throw new \Exception("Your already have reserved this book");
        }

        if ($reservationDetails->isBorrowed() && $reservationDetails->getMemberId() !== $this->getId()) {
            throw new \Exception("This book is already reserved by another user");
        }

        $bookReservation->updateReservationStatus($bookItem, $this);
    }

    /**
     * @param BookItem $bookItem
     * @param BookReservation $bookReservation
     *
     * @throws \Exception
     */
    public function checkOutBookItem(BookItem $bookItem, BookReservation $bookReservation): void
    {
        if ($this->totalBooksCheckedOut >= 3) {
            throw new \Exception('Limit exceeded');
        }

        if (!$bookItem->isAvailable()) {
            throw new \Exception('Book is not available');
        }

        $reservationDetails = $bookReservation->fetchReservationDetails($bookItem->getBarCode());
        if ($reservationDetails->getMemberId() !== $this->getId()) {
            throw new \Exception("This book already reserved by another user");
        }

        $bookReservation->updateReservationStatus($bookItem, $this);
        $bookItem->checkOut($this);
        $this->totalBooksCheckedOut++;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateOfMembership(): \DateTimeImmutable
    {
        return $this->dateOfMembership;
    }

    /**
     * @return int
     */
    public function getTotalBooksCheckedOut(): int
    {
        return $this->totalBooksCheckedOut;
    }
}