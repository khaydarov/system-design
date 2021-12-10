<?php

declare(strict_types=1);

namespace App\Example\Shared\ServiceBus;

use DI\Container;

class CommandBus
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function command(Command $command)
    {
        $commandHandler = $this->container->get((get_class($command) . 'Handler'));
        if ($commandHandler instanceof CommandHandler) {
            $commandHandler->handle($command);
        }
    }
}