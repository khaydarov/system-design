<?php
declare(strict_types=1);

namespace App\Patterns\Command;

/**
 * Class Controller
 * @package App\Patterns\Command
 */
class Controller
{
    /**
     * @var CommandContext
     */
    private CommandContext $context;

    public function __construct()
    {
        $this->context = new CommandContext();
    }

    /**
     * @return CommandContext
     */
    public function getContext(): CommandContext
    {
        return $this->context;
    }

    public function process()
    {
        $action = $this->context->get('action') ?? 'default';
        $command = new LoginCommand();

        $result = $command->execute($this->context);
    }
}