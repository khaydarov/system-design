<?php

declare(strict_types=1);

namespace LibraryManagementSystem\Account;

use LibraryManagementSystem\BookItem;
use LibraryManagementSystem\BookLending;
use LibraryManagementSystem\BookReservation;

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
    public function checkOutBookItem(BookItem $bookItem, BookReservation $bookReservation, BookLending $bookLending): void
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
        $bookLending->lendBook($bookItem, $this);
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