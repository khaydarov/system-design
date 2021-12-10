<?php
declare(strict_types=1);

namespace App\Patterns\DataMapper;

use App\Patterns\DomainModel\DomainObject;
use App\Patterns\Registry\Registry;

/**
 * Class Mapper
 * @package App\Patterns\DataMapper
 */
abstract class Mapper
{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $registry = Registry::instance();
        $this->pdo = $registry->getPdo();
    }

    public function find(int $id): DomainObject
    {
        $this->selectStmt()->execute($id);
        $row = $this->selectStmt()->fetch();
        $this->selectStmt()->closeCursor();

        if (! is_array($row)) {
            return null;
        }

        if (! isset($row['id'])) {
            return null;
        }

        return $this->createObject($row);
    }

    public function createObject(array $raw): DomainObject
    {
        return $this->doCreateObject($raw);
    }

    public function insert(DomainObject $object)
    {
        $this->doInsert($object);
    }

    abstract protected function update(DomainObject $object);

    abstract protected function doCreateObject(array $raw): DomainObject;

    abstract protected function doInsert(DomainObject $object);

    abstract protected function selectStmt(): \PDOStatement;

    abstract protected function targetClass(): string;
}