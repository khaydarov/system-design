<?php

namespace App\Creational\FactoryMethod\Logger;

class StdoutLogger implements Logger
{
    /**
     * @param string $message
     */
    public function log(string $message): void
    {
        echo $message;
    }
}