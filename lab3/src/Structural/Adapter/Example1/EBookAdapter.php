<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example1;


class EBookAdapter implements BookInterface
{
    /**
     * @var EBookInterface
     */
    protected $e_book;

    public function __construct(EBookInterface $e_book)
    {
        $this->e_book = $e_book;
    }

    public function open()
    {
        $this->e_book->unlock();
    }

    public function turnPage()
    {
        $this->e_book->pressNext();
    }

    public function getPage(): int
    {
        return $this->e_book->getPage()[0];
    }
}