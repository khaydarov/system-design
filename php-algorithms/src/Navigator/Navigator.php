<?php

declare(strict_types=1);

namespace App\Navigator;

use App\Common\Queue;

final class Navigator
{
    /**
     * @var array
     */
    private $map = [];

    /**
     * Navigator constructor.
     * @param array $mapData
     */
    public function __construct(array $mapData = [])
    {
        $this->initialize($mapData);
    }

    /**
     * @param string $from
     * @param string $to
     * @return array
     */
    public function findRoutes(string $from, string $to): array
    {
        return $this->findPossibleRoutes($from, $to);
    }

    private function initialize(array $mapData)
    {
        $this->map = $mapData;
    }

    private function findPossibleRoutes(string $from, string $to): array
    {
        $queue = new Queue();
        if (!isset($this->map[$from])) {
            throw new \InvalidArgumentException('invalid points');
        }

        $pointsParents = [];
        $routeExist = false;
        $queue->enQueue($from);
        while (!$queue->isEmpty()) {
            $length = $queue->getSize();
            for ($i = 0; $i < $length; $i++) {
                $point = $queue->deQueue();

                if ($point === $to) {
                    $routeExist = true;
                }

                if (!isset($this->map[$point])) {
                    continue;
                }

                $nextRoutes = $this->map[$point];
                foreach ($nextRoutes as $nextPoint => $routes) {
                    $queue->enQueue((string) $nextPoint);
                    foreach ($routes as $route) {
                        $pointsParents[$nextPoint][] = [$point, $route];
                    }
                }
            }
        }

        if (!$routeExist) {
            return [];
        }

        return $this->collectRoutes($pointsParents, $from, $to);
    }

    private function collectRoutes(array $routeMapping, string $from, string $to): array
    {
        $routesPaths = [];
        $this->collectorUtil($routeMapping, $from, $to, $routesPaths, []);

        $routes = [];
        foreach ($routesPaths as &$routePaths) {
            $routePaths = array_reverse($routePaths);
            $routes[] = new Route($routePaths);
        }
        unset($routePaths);

        return $routes;
    }

    private function collectorUtil(
        array $routeMapping,
        string $from,
        string $to,
        array &$routes,
        array $collected
    ): void {
        if ($from === $to) {
            $routes[] = $collected;
            return;
        }

        $memorizedCollection = $collected;
        $nextPoints = $routeMapping[$to];
        foreach ($nextPoints as $nextPoint) {
            $memorizedCollection[] = $nextPoint[1];
            $this->collectorUtil($routeMapping, $from, $nextPoint[0], $routes, $memorizedCollection);
            $memorizedCollection = $collected;
        }
    }
}