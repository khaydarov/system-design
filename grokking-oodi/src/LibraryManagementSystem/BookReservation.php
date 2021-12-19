<?php

declare(strict_types=1);

namespace LibraryManagementSystem;

use LibraryManagementSystem\Account\Account;

class BookReservation
{
    public function reserveBookForAccount(Account $account, BookItem $bookItem)
    {
        if (!$bookItem->isAvailable()) {
            throw new \Exception('Book is not available');
        }

        $reservationDetails = $this->fetchReservationDetails($bookItem->getBarCode());
        if ($reservationDetails->isBorrowed() && $reservationDetails->getMemberId() === $account->getId()) {
            throw new \Exception("This user already have reserved this book");
        }

        if ($reservationDetails->isBorrowed() && $reservationDetails->getMemberId() !== $account->getId()) {
            throw new \Exception("This book is already reserved by another user");
        }

        $this->updateReservationStatus($bookItem, $account);
    }

    /**
     * @param string $barCode
     *
     * @return ReservationDetails
     */
    public function fetchReservationDetails(string $barCode): ReservationDetails
    {
        // Fetching data...
        return new ReservationDetails(
            $barCode,
            true,
            new \DateTimeImmutable(),
            10
        );
    }

    /**
     * @param BookItem $bookItem
     * @param Account $account
     */
    public function updateReservationStatus(BookItem $bookItem, Account $account): void
    {
        // Update status
        $bookItem->checkOut();
    }
}