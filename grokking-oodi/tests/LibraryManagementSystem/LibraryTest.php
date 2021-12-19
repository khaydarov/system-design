<?php

declare(strict_types=1);

namespace LibraryManagementSystem;

use LibraryManagementSystem\Account\Member;
use LibraryManagementSystem\Account\Person;
use PHPUnit\Framework\TestCase;

class LibraryTest extends TestCase
{
    public function testLibrary()
    {
        $library = new Library("New library", "Address");
        $book = new BookItem(
            "isbn",
            "title",
            "subject",
            "publisher",
            "RU",
            100,
            "123-321",
            new Rack(10, "location"),
            BookStatus::available(),
            new BookFormat(),
            100
        );

        $account = new Member(
            10,
            new Person("Me", "You"),
            new \DateTimeImmutable(),
            0
        );

        $reservation = new BookReservation();
        $reservation->reserveBookForAccount($account, $book);
    }
}