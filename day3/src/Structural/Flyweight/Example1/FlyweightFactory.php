<?php
declare(strict_types=1);

namespace App\Structural\Flyweight\Example1;


class FlyweightFactory implements \Countable
{
    /**
     * @var CharacterFlyweight[];
     */
    private $pool = [];

    public function get(string $name): CharacterFlyweight
    {
        if (!isset($this->pool[$name])) {
            $this->pool[$name] = new CharacterFlyweight($name);
        }

        return $this->pool[$name];
    }

    public function count(): int
    {
        return count($this->pool);
    }
}