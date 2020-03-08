<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example1;

interface BookInterface
{
    public function turnPage();
    public function open();
    public function getPage(): int;
}