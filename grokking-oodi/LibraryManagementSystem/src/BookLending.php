<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem;

use App\LibraryManagementSystem\Account\Member;

interface BookLending
{
    /**
     * @param BookItem $bookItem
     * @param Member $member
     */
    public function lendBook(BookItem $bookItem, Member $member): void;
}