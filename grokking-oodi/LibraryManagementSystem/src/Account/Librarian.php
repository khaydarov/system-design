<?php

declare(strict_types=1);

namespace App\LibraryManagementSystem\Account;

use App\LibraryManagementSystem\BookItem;

final class Librarian extends Account
{
    /**
     * @var array
     */
    private $bookItems = [];

    /**
     * @param BookItem $bookItem
     */
    public function addBookItem(BookItem $bookItem): void
    {
        $this->bookItems[] = $bookItem;
    }

    public function blockMember(Member $member): void
    {
    }

    public function unblockMember(Member $member): void
    {
    }
}