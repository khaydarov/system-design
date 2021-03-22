<?php
declare(strict_types=1);

namespace App\Additional\Repository;

/**
 * Class InMemoryPersistence
 * @package App\Additional\Repository
 */
class InMemoryPersistence implements Persistence
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var int
     */
    private $lastId = 0;

    /**
     * @return int
     */
    public function generateId(): int
    {
        $this->lastId++;

        return $this->lastId;
    }

    /**
     * @param array $data
     */
    public function persist(array $data)
    {
        $this->data[$this->lastId] = $data;
    }

    /**
     * @param int $id
     * @return array
     */
    public function retrieve(int $id): array
    {
        if (!isset($this->data[$id])) {
            throw new \OutOfBoundsException(sprintf('No data found with id %d', $id));
        }

        return $this->data[$id];
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        if (!isset($this->data[$id])) {
            throw new \OutOfBoundsException(sprintf('No data found with id %d', $id));
        }

        unset($this->data[$id]);
    }
}