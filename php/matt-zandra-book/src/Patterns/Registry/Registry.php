<?php
declare(strict_types=1);

namespace App\Patterns\Registry;

use App\Patterns\FrontController\ApplicationHelper;

/**
 * Class Registry
 * @package App\Patterns\Registry
 */
class Registry
{
    /**
     * @var Registry
     */
    private static $instance;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var ApplicationHelper
     */
    private $applicationHelper;

    /**
     * @var Config
     */
    private $config;

    private function __construct()
    {
    }

    /**
     * @return Registry
     */
    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        if ($this->request === null) {
            $this->request = new Request();
        }
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return ApplicationHelper
     */
    public function getApplicationHelper(): ApplicationHelper
    {
        if ($this->applicationHelper === null) {
            $this->applicationHelper = new ApplicationHelper();
        }

        return $this->applicationHelper;
    }

    /**
     * @param Config $config
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @return Config
     */
    public function getConfig(): Config
    {
        if ($this->config === null) {
            $this->config = new Config();
        }

        return $this->config;
    }

    public function getCommands(): Commands
    {
        return $this->commands;
    }
}