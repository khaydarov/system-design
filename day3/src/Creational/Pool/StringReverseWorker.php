<?php
declare(strict_types=1);

namespace App\Creational\Pool;

class StringReverseWorker
{
    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * StringReverseWorker constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->created_at = new \DateTime();
    }

    /**
     * @param string $text
     * @return string
     */
    public function run(string $text)
    {
        return strrev($text);
    }
}