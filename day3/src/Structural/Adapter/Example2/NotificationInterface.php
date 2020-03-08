<?php
declare(strict_types=1);

namespace App\Structural\Adapter\Example2;

interface NotificationInterface
{
    public function send(string $title, string $message);
}