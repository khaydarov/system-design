<?php
declare(strict_types=1);

namespace App\Patterns\ServiceLocator;

use App\Patterns\FactoryMethod\BloggsCommsManager;
use App\Patterns\FactoryMethod\CommsManager;
use PHPUnit\Util\Exception;

/**
 * Class AppConfig
 * @package App\Patterns\ServiceLocator
 */
class AppConfig
{
    /**
     * @var AppConfig
     */
    private static AppConfig $instance;

    /**
     * @var CommsManager
     */
    private CommsManager $commsManager;

    private function __construct()
    {
        $this->init();
    }

    /**
     * initializes Singleton instance
     */
    private function init()
    {
        switch (Settings::$COMMSTYPE) {
            case 'Bloggs':
                $this->commsManager = new BloggsCommsManager();
                break;
            default:
                throw new Exception();
        }
    }

    /**
     * @return AppConfig
     */
    public static function getInstance(): AppConfig
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return CommsManager
     */
    public function getCommsManager(): CommsManager
    {
        return $this->commsManager;
    }
}