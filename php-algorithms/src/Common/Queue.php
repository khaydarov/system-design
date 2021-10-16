<?php

declare(strict_types=1);

namespace App\Common;

/**
 * Class Queue
 * @package App\Common
 */
final class Queue
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * Adds data to the queue
     *
     * @param $data
     */
    public function enQueue($data): void
    {
        array_push($this->data, $data);
    }

    /**
     * Returns data from the beginning and removes it
     *
     * @return mixed
     */
    public function deQueue(): mixed
    {
        return array_shift($this->data);
    }

    /**
     * Returns data from the beginning
     *
     * @return mixed
     */
    public function getFront(): mixed
    {
        return $this->data[0];
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->data);
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return count($this->data);
    }
}