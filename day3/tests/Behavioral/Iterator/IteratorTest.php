<?php
declare(strict_types=1);

use App\Behavioral\Iterator\Example1\Book;
use App\Behavioral\Iterator\Example1\BookList;
use PHPUnit\Framework\TestCase;

/**
 * Class IteratorTest
 */
class IteratorTest extends TestCase
{
    public function testCanIterateOverBookList()
    {
        $book_list = new BookList();
        $book_list->addBook(new Book('Learning PHP Design Patterns', 'William Sanders'));
        $book_list->addBook(new Book('Professional PHP Design Patterns', 'Aaron Saray'));
        $book_list->addBook(new Book('Clean Code', 'Robert C. Martin'));

        $books = [];

        foreach ($book_list as $book) {
            $books[] = $book->getAuthorAndTitle();
        }

        $this->assertSame([
            'Learning PHP Design Patterns by William Sanders',
            'Professional PHP Design Patterns by Aaron Saray',
            'Clean Code by Robert C. Martin',
        ], $books);
    }
}