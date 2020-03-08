<?php
declare(strict_types=1);

namespace App\Structural\DataMapper;

/**
 * Class UserMapper
 * @package App\Structural\DataMapper
 */
class UserMapper
{
    /**
     * @var
     */
    private $adapter;

    public function __construct(StorageAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function findById(int $id): User
    {
        $result = $this->adapter->find($id);

        if ($result === null) {
            throw new \InvalidArgumentException("not found");
        }

        return $this->mapRowToUser($result);
    }

    private function mapRowToUser(array $row): User
    {
        return User::fromState($row);
    }
}