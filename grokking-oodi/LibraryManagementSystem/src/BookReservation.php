<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem;

use App\LibraryManagementSystem\Account\Member;

interface BookReservation
{
    /**
     * @param string $barCode
     *
     * @return ReservationDetails
     */
    public function fetchReservationDetails(string $barCode): ReservationDetails;

    /**
     * @param BookItem $bookItem
     * @param Member $member
     */
    public function updateReservationStatus(BookItem $bookItem, Member $member): void;
}