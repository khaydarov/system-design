<?php
declare(strict_types=1);

namespace App\Patterns\Interpreter;

/**
 * Class LiteralExpression
 * @package App\Patterns\Interpreter
 */
class LiteralExpression extends Expression
{
    private $value;

    /**
     * LiteralExpression constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function interpret(InterpreterContext $context)
    {
        $context->replace($this, $this->value);
    }
}