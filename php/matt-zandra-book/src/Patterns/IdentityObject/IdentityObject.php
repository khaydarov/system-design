<?php
declare(strict_types=1);

namespace App\Patterns\IdentityObject;

class IdentityObject
{
    private string $name;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}