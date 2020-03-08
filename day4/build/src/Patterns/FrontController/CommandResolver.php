<?php
declare(strict_types=1);

namespace App\Patterns\FrontController;


use App\Patterns\Command\Command;
use App\Patterns\FronController\Registry;

class CommandResolver
{
    /**
     * @var Command|null
     */
    private static $refCmd = null;

    /**
     * @var
     */
    private static $defaultCmd = DefaultCommand::class;

    public function __construct()
    {
        self::$refCmd = new \ReflectionClass(Command::class);
    }

    public function getCommand(Request $request): Command
    {
        $registry = Registry::instance();
        $commands = $registry->getCommands();

        $path = $request->getPath();
        $class = $commands->get($path);

        if ($class === null) {
            $request->addFeedback('not found');
            return new self::$defaultCmd();
        }

        if ( !class_exists($class) ) {
            $request->addFeedback('class not found');
            return new self::$defaultCmd;
        }

        $refClass = new \ReflectionClass($class);

        if ( !$refClass->isSubclassOf(self::$refCmd) ) {
            $request->addFeedback('Go!');
            return new self::$defaultCmd;
        }

        return $refClass->newInstance();
    }
}