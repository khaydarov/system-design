<?php
declare(strict_types=1);

namespace App\Patterns\Interpreter;

/**
 * Class Expression
 * @package App\Patterns\Interpreter
 */
abstract class Expression
{
    /**
     * @var int
     */
    private static $keyCount = 0;

    private $key;

    /**
     * @param InterpreterContext $context
     * @return mixed
     */
    abstract public function interpret(InterpreterContext $context);

    public function getKey()
    {
        if ( !isset($this->key) ) {
            self::$keyCount++;
            $this->key = self::$keyCount;
        }

        return $this->key;
    }
}