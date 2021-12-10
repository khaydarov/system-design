<?php
declare(strict_types=1);

namespace App\Patterns\Interpreter;

/**
 * Class VariableExpression
 * @package App\Patterns\Interpreter
 */
class VariableExpression extends Expression
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $value;

    public function __construct(string $name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function interpret(InterpreterContext $context)
    {
        if ($this->value !== null) {
            $context->replace($this, $this->value);
            $this->value = null;
        }
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getKey()
    {
        return $this->name;
    }
}