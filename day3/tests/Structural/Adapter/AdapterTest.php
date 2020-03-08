<?php
declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \App\Structural\Adapter\Example1\Kindle;
use \App\Structural\Adapter\Example1\Book;
use \App\Structural\Adapter\Example1\EBookAdapter;

class AdapterTest extends TestCase
{
    public function testCanTurnPageOnBook()
    {
        $book = new Book();

        $book->open();
        $book->turnPage();

        $this->assertSame(2, $book->getPage());
    }

    public function testCanKindleTurnPageAsNormalBook()
    {
        $book = new Kindle();
        $adapter = new EBookAdapter($book);

        $adapter->open();
        $adapter->turnPage();

        $this->assertSame(2, $adapter->getPage());
    }
}