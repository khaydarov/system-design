<?php

declare(strict_types=1);

namespace App\Patterns\Interpreter;

/**
 * Class ScannerState
 * @package App\Patterns\Interpreter
 */
class ScannerState
{
    public $lineNo;
    public $charNo;
    public $token;
    public $tokenType;
    public $r;
    public $context;
}