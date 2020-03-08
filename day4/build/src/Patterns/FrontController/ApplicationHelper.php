<?php
declare(strict_types=1);

namespace App\Patterns\FrontController;

use App\Patterns\Registry\Registry;
use PHPUnit\Util\Exception;

/**
 * Class ApplicationHelper
 * @package App\Patterns\FrontController
 */
class ApplicationHelper
{
    /**
     * @var string
     */
    private $config = __DIR__ . '/config.ini';

    /**
     * @var Registry
     */
    private $registry;

    public function __construct()
    {
        $this->registry = Registry::instance();
    }

    public function init()
    {
//        $his-
    }

    private function setupOptions()
    {
        if ( !file_exists($this->config) ) {
            throw new Exception();
        }

        $options = parse_ini_file($this->config, true);
        $config = new Config($options['config']);

        $this->registry->setConfig($config);
        $commands = new Config($options['commands']);
        $this->registry->setCommands($commands);
    }
}