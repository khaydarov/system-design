<?php
declare(strict_types=1);

namespace App\Creational\Pool;

class WorkerPool implements \Countable
{
    /**
     * @var StringReverseWorker[]
     */
    private $occupied_workers = [];

    /**
     * @var StringReverseWorker[]
     */
    private $free_workers = [];

    /**
     * Returns worker
     *
     * @return StringReverseWorker
     * @throws \Exception
     */
    public function get(): StringReverseWorker
    {
        if (count($this->free_workers) === 0) {
            $worker = new StringReverseWorker();
        } else {
            $worker = array_pop($this->free_workers);
        }

        $this->occupied_workers[spl_object_hash($worker)] = $worker;
        return $worker;
    }

    /**
     * @param StringReverseWorker $worker
     */
    public function dispose(StringReverseWorker $worker): void
    {
        $key = spl_object_hash($worker);

        if (isset($this->occupied_workers[$key])) {
            unset($this->occupied_workers[$key]);
            $this->free_workers[$key] = $worker;
        }
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->free_workers) + count($this->occupied_workers);
    }
}