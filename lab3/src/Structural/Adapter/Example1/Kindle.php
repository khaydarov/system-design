<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example1;


class Kindle implements EBookInterface
{
    /**
     * @var int
     */
    private $page = 1;

    /**
     * @var int
     */
    private $total_pages = 100;

    public function pressNext()
    {
        $this->page++;
    }

    public function unlock()
    {
    }

    /**
     * @return array
     */
    public function getPage(): array
    {
        return [
            $this->page,
            $this->total_pages,
        ];
    }
}