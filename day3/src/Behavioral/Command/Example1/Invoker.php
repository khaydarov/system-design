<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example1;

/**
 * Class Invoker
 * @package App\Behavioral\Command\Example1
 */
class Invoker
{
    /**
     * @var CommandInterface
     */
    private $command;

    /**
     * @param CommandInterface $cmd
     */
    public function setCommand(CommandInterface $cmd)
    {
        $this->command = $cmd;
    }

    /**
     * executed the command;
     */
    public function run()
    {
        $this->command->execute();
    }
}