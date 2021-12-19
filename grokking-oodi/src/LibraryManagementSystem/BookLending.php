<?php

declare(strict_types=1);

namespace LibraryManagementSystem;

use LibraryManagementSystem\Account\Member;

interface BookLending
{
    /**
     * @param BookItem $bookItem
     * @param Member $member
     */
    public function lendBook(BookItem $bookItem, Member $member): void;
}