<?php

declare(strict_types=1);

namespace App\EventSourcing;

/**
 * Class Serializer
 * @package App\EventSourcing
 */
class Serializer
{
    public function serialize($value)
    {
        return serialize($value);
    }

    public function unserialize($value)
    {
        return unserialize($value);
    }
}