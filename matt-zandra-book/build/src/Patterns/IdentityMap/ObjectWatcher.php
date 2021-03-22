<?php
declare(strict_types=1);

namespace App\Patterns\IdentityMap;

use App\Patterns\DomainModel\DomainObject;

/**
 * Class ObjectWatcher
 * @package App\Patterns\IdentityMap
 */
class ObjectWatcher
{
    private $all = [];
    private static $instance = null;

    private function __construct()
    {
    }

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function globalKey(DomainObject $obj): string
    {
        return get_class($obj) . ':' . $obj->getId();
    }

    public static function add(DomainObject $obj)
    {
        $instance = self::instance();

        $instance->all[$instance->globalKey($obj)] = $obj;
    }

    public static function exists($className, $id)
    {
        $instance = self::instance();
        $key = $className . ':' . $id;

        if (isset($instance->all[$key])) {
            return $instance->all[$key];
        }

        return null;
    }
}