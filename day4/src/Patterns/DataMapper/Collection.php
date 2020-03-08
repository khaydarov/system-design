<?php
declare(strict_types=1);

namespace App\Patterns\DataMapper;


use App\Patterns\DomainModel\DomainObject;
use PHPUnit\Util\Exception;

abstract class Collection implements \Iterator
{
    protected $mapper;
    protected $total = 0;
    protected $raw = [];

    private $pointer = 0;
    private $objects = [];

    public function __construct(
        array $raw = [],
        Mapper $mapper = null
    ){
        $this->raw = $raw;
        $this->total = count($raw);

        if (count($raw) && $mapper === null) {
            throw new Exception();
        }

        $this->mapper = $mapper;
    }

    public function add(DomainObject $object)
    {
        $class = $this->targetClass();

        if (! ($object instanceof $class)) {
            throw new Exception();
        }

        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    abstract public function targetClass(): string;

    protected function notifyAccess()
    {

    }

    private function getRow($num)
    {
        $this->notifyAccess();

        if ($num >= $this->total || $num < 0) {
            return null;
        }

        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }

        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->mapper->createObject($this->raw[$num]);
            return $this->objects[$num];
        }
    }

    public function rewind()
    {
        $this->pointer = 0;
    }

    public function current()
    {
        return $this->getRow($this->pointer);
    }

    public function key()
    {
        return $this->pointer;
    }

    public function next()
    {
        $row = $this->getRow($this->pointer);

        if ($row !== null) {
            $this->pointer++;
        }
    }

    public function valid()
    {
        return $this->current() !== null;
    }
}