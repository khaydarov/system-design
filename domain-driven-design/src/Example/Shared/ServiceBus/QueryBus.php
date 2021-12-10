<?php

declare(strict_types=1);

namespace App\Example\Shared\ServiceBus;

use DI\Container;

class QueryBus
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function ask(Query $query)
    {
        $queryHandler = $this->container->get(get_class($query) . 'Handler');
        if (!($queryHandler instanceof QueryHandler)) {
            return null;
        }

        return $queryHandler->handle($query);
    }
}