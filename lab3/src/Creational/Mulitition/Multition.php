<?php
declare(strict_types=1);

namespace App\Creational\Multition;

final class Multition
{
    const INSTANCE_1 = '1';
    const INCTANCE_2 = '2';

    /**
     * @var Multition[]
     */
    private static $instances = [];

    /**
     * Multition constructor.
     */
    private function __construct()
    {
    }

    /**
     * prevent instance being cloned
     */
    private function __clone()
    {
    }

    /**
     * @param string $instance_name
     * @return Multition
     */
    public static function getInstance(string $instance_name): Multition
    {
        if (!isset(self::$instances[$instance_name])) {
            self::$instances[$instance_name] = new self();
        }

        return self::$instances[$instance_name];
    }

}