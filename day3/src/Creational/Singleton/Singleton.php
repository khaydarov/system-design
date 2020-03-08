<?php
declare(strict_types=1);

namespace App\Creational\Singleton;

class Singleton
{
    /**
     * @var Singleton
     */
    private static $instance;

    public static function getInstance(): Singleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}