<?php
declare(strict_types=1);

namespace App\Creational\SimpleFactory;

class Bycicle
{
    public function driveTo(string $desctination)
    {
        echo 'I got ' . $desctination;
    }
}