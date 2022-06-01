<?php

declare(strict_types=1);

namespace Khaydarovm\Common\Closure;

use Closure;

trait MetaTrait
{
    private $methods = [];

    public function addMethod(string $methodName, callable $function): void
    {
        if (!is_callable($function)) {
            throw new \InvalidArgumentException('function must be callable');
        }

        $this->methods[$methodName] = Closure::bind($function, $this, get_class());
    }

    public function __call(string $methodName, array $args): mixed
    {
        if (!isset($this->methods[$methodName])) {
            throw new \InvalidArgumentException('method does not exist');
        }

        return call_user_func_array($this->methods[$methodName], $args);
    }
}