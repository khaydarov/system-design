<?php

declare(strict_types=1);

namespace App\Example;

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

    /**
     * @var array
     */
    private $contexts = [];

    public function __construct(array $contexts)
    {
        $this->contexts = $contexts;
        $this->bootstrap();
    }

    private function bootstrap()
    {
        $this->buildContainer();
        $this->buildRouteDispatcher();
    }

    private function buildContainer()
    {
        $definitions = [];
        foreach ($this->contexts as $context) {
            $path = $context . 'di.php';
            if (is_file($path)) {
                $definitions = array_merge($definitions, include_once $path);
            }
        }

        $builder = new ContainerBuilder();
        $builder
            ->addDefinitions($definitions)
            ->useAutowiring(true);

        $this->container = $builder->build();
    }

    private function buildRouteDispatcher()
    {
        $routes = [];
        foreach ($this->contexts as $context) {
            $path = $context . 'Ui/Web/routes.php';
            if (is_file($path)) {
                $routes = array_merge($routes, include_once $path);
            }
        }

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