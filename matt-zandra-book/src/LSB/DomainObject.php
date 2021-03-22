<?php
declare(strict_types=1);

namespace App\LSB;

abstract class DomainObject
{
    private $group;

    public function __construct()
    {
        $this->group = static::getGroup();
    }

    public static function getGroup(): string
    {
        return 'default';
    }

    public static function create(): DomainObject
    {
        return new static();
    }
}