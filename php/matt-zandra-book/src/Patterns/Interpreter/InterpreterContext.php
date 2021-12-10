<?php
declare(strict_types=1);

namespace App\Patterns\Interpreter;

/**
 * Class InterpreterContext
 * @package App\Patterns\Interpret
 */
class InterpreterContext
{
    private $expressionStore = [];

    /**
     * @param Expression $exp
     * @param $value
     */
    public function replace(Expression $exp, $value)
    {
        $this->expressionStore[$exp->getKey()] = $value;
    }

    /**
     * @param Expression $exp
     * @return mixed
     */
    public function lookUp(Expression $exp)
    {
        return $this->expressionStore[$exp->getKey()];
    }
}