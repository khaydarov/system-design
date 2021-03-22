<?php
declare(strict_types=1);

namespace App\Behavioral\Iterator\Example1;

/**
 * Class BookList
 * @package App\Behavioral\Iterator\Example1
 */
class BookList implements \Countable, \Iterator
{
    /**
     * @var Book[]
     */
    private $books = [];

    /**
     * @var int
     */
    private $current_index = 0;

    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    public function removeBook(Book $book_to_remove)
    {
        foreach($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() === $book_to_remove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function current(): Book
    {
        return $this->books[$this->current_index];
    }

    public function key(): int
    {
        return $this->current_index;
    }

    public function next()
    {
        $this->current_index++;
    }

    public function rewind()
    {
        $this->current_index = 0;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->current_index]);
    }

}