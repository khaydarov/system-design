<?php
declare(strict_types=1);

namespace App\Patterns\Command;

/**
 * Class CommandContext
 * @package App\Patterns\Command
 */
class CommandContext
{
    /**
     * @var array
     */
    private $params = [];

    /**
     * @var string
     */
    private $error = '';

    public function __construct()
    {
        $this->params = $_REQUEST;
    }

    public function addParam(string $key, $value): void
    {
        $this->params[$key] = $value;
    }

    public function get(string $key): ?string
    {
        return $this->params[$key] ?? null;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    public function getError(): string
    {
        return $this->error;
    }
}