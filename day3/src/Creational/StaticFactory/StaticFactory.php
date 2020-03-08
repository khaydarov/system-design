<?php
declare(strict_types=1);

namespace App\Creational\StaticFactory;

final class StaticFactory
{
    public static function factory(string $type): Formatter
    {
        switch ($type) {
            case 'number';
                $class = new FormatNumber();
                break;
            case 'string':
                $class = new FormatString();
                break;
            default:
                throw new \Exception();
        }

        return $class;
    }
}