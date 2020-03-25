<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example2;

/**
 * Class Queue
 * @package App\Behavioral\Command\Example2
 */
class Queue
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var Queue
     */
    private static $instance;

    public function isEmpty(): bool
    {
        return count($this->data) === 0;
    }

    public function add(CommandInterface $command): void
    {
        $this->data[] = base64_encode(serialize($command));
    }

    public function getCommand(): CommandInterface
    {
        $command = array_shift($this->data);
        return unserialize(base64_decode($command), null);
    }

    public function work(): void
    {
        while (!$this->isEmpty()) {
            $command = $this->getCommand();
            $command->execute();
        }
    }

    public static function get(): Queue
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}