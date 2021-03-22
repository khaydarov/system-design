<?php
declare(strict_types=1);

namespace App\Creational\FactoryMethod\Logger;

class FileLogger implements Logger
{
    /**
     * @var string
     */
    private $filepath;

    /**
     * FileLogger constructor.
     * @param string $filepath
     */
    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * @param string $message
     */
    public function log(string $message): void
    {
        file_put_contents($this->filepath, $message . PHP_EOL, FILE_APPEND);
    }
}