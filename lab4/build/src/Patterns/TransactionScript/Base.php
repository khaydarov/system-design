<?php
declare(strict_types=1);

namespace App\Patterns\TransactionScript;

use App\Patterns\Registry\Registry;

/**
 * Class Base
 * @package App\Patterns\TransactionScript
 */
abstract class Base
{
    private $pdo;
    private $config = __DIR__ . '/data/config.ini';
    private $stmts = [];

    public function __construct()
    {
        $reg = Registry::instance();
        $options = parse_ini_file($this->config, true);

        // ...
    }
}