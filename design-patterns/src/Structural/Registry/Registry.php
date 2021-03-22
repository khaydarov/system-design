<?php
declare(strict_types=1);

namespace App\Structural\Registry;

use http\Exception\InvalidArgumentException;

/**
 * ANTI-PATTERN!!!
 *
 * Class Registry
 * @package App\Structural\Registry
 */
final class Registry
{
    const LOGGER = 'logger';

    /**
     * @var array
     */
    private static $stored_values = [];

    /**
     * @var array
     */
    private static $allowed_keys = [
        self::LOGGER
    ];

    /**
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value)
    {
        if (!in_array($key, self::$allowed_keys)) {
            throw new \InvalidArgumentException('Invalid key given');
        }

        self::$stored_values[$key] = $value;
    }

    public static function get(string $key)
    {
        if (!in_array($key, self::$allowed_keys) || !isset(self::$stored_values[$key])) {
            throw new \InvalidArgumentException('Invalid key given');
        }

        return self::$stored_values[$key];
    }
}