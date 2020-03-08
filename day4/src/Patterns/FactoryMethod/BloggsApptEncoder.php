<?php
declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "BloggsCal format";
    }
}