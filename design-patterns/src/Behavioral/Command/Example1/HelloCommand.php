<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example1;

/**
 * Class HelloCommand
 * @package App\Behavioral\Command\Example1
 */
class HelloCommand implements CommandInterface
{
    /**
     * @var Receiver
     */
    private $output;

    /**
     * HelloCommand constructor.
     * @param Receiver $console
     */
    public function __construct(Receiver $console)
    {
        $this->output = $console;
    }

    /**
     * execute
     */
    public function execute()
    {
        $this->output->write('Hello, World');
    }
}