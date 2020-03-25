<?php
declare(strict_types=1);

namespace App\Patterns\FrontController;

use App\Patterns\FrontController\Controller\AppController;
use App\Patterns\Registry\Registry;

/**
 * Class Controller
 * @package App\Patterns\FrontController
 */
class Controller
{
    /**
     * @var Registry
     */
    private $registry;

    private function __construct()
    {
        $this->registry = Registry::instance();
    }

    public static function run()
    {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }

    private function init()
    {
        $this->registry->getApplicationHelper()->init();
    }

    private function handleRequest()
    {
        $request = $this->registry->getRequest();
        $controller = new AppController();
        $command = $controller->getCommand($request);
        $command->execute($request);
        $view = $controller->getView($request);
        $view->render($request);
    }
}