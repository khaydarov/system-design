<?php
declare(strict_types=1);

namespace App\Creational\Builder\Units;

abstract class Unit
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @param $key
     * @param $value
     */
    public function setPart($key, $value): void
    {
        $this->data[$key] = $value;
    }

    /**
     * @return int
     */
    public function details(): int
    {
        return count($this->data);
    }
}