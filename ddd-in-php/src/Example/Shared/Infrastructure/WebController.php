<?php

declare(strict_types=1);

namespace App\Example\Shared\Infrastructure;

use App\Example\Shared\ServiceBus\CommandBus;
use App\Example\Shared\ServiceBus\QueryBus;

abstract class WebController
{
    /**
     * @var CommandBus
     */
    protected $commandBus;

    /**
     * @var QueryBus
     */
    protected $queryBus;

    /**
     * WebController constructor.
     * @param CommandBus $commandBus
     * @param QueryBus $queryBus
     */
    public function __construct(CommandBus $commandBus, QueryBus $queryBus)
    {
        $this->commandBus = $commandBus;
        $this->queryBus = $queryBus;
    }
}