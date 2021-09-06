<?php

declare(strict_types=1);

namespace App\Example\Content\Ui\Web;

use App\Example\Content\Domain\Model\Entry\EntryRepository;
use App\Example\Content\Ui\Web\Controller\EntryController;
use App\Example\Content\Ui\Web\Controller\MainController;
use DI\Container;
use DI\ContainerBuilder;
use FastRoute\Dispatcher;
use FastRoute\Dispatcher\GroupCountBased;
use FastRoute\RouteCollector;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    public function __construct()
    {
        $this->bootstrap();
    }

    private function bootstrap()
    {
        $this->buildContainer();
        $this->buildRouteDispatcher();
    }

    private function buildContainer()
    {
        // init DI
        $definitions = include_once './di/definitions.php';
        $builder = new ContainerBuilder();
        $builder
            ->addDefinitions($definitions)
            ->useAutowiring(true);
        $this->container = $builder->build();
    }

    private function buildRouteDispatcher()
    {
        $routes = include_once './routes/routes.php';
        $routeCollector = new RouteCollector(new \FastRoute\RouteParser\Std(), new \FastRoute\DataGenerator\GroupCountBased());

        foreach ($routes as $route) {
            $routeCollector->addRoute($route[0], $route[1], $route[2]);
        }

        $this->dispatcher = new GroupCountBased($routeCollector->getData());
    }

    public function handle(Request $request): ?Response
    {
        $httpMethod = $request->server->get('REQUEST_METHOD');
        $uri = $request->server->get('REQUEST_URI');

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);

        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                return new JsonResponse('', 404);
            case Dispatcher::METHOD_NOT_ALLOWED:
                return new JsonResponse('', 405);
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                $vars['request'] = $request;

                return $this->container->call($handler, $vars);
        }

        return null;
    }
}