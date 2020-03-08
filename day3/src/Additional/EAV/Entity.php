<?php
declare(strict_types=1);

namespace App\Additional\EAV;

/**
 * Class Entity
 * @package App\Additional\EAV
 */
class Entity
{
    /**
     * @var \SplObjectStorage
     */
    private $values;

    /**
     * @var string
     */
    private $name;

    /**
     * Entity constructor.
     * @param string $name
     * @param $values
     */
    public function __construct(string $name, $values)
    {
        $this->values = new \SplObjectStorage();
        $this->name = $name;

        foreach ($values as $value) {
            $this->values->attach($value);
        }
    }

    public function __toString(): string
    {
        $text = [$this->name];

        foreach ($this->values as $value) {
            $text[] = (string) $value;
        }

        return implode(', ' , $text);
    }
}