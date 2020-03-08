<?php

declare(strict_types=1);

namespace App\Patterns\Interpreter;

use App\Behavioral\Strategy\Example1\Context;

/**
 * Class Scanner
 * @package App\Patterns\Interpreter
 */
class Scanner
{
    const WORD          = 1;
    const QUOTE         = 2;
    const APOS          = 3;
    const WHITESPACE    = 6;
    const EOL           = 8;
    const CHAR          = 9;
    const EOF           = 0;
    const SOF           = -1;

    protected $lineNo = 1;
    protected $charNo = 0;
    protected $token = null;
    protected $tokenType = -1;

    private $context;
    private $r;

    public function __construct(Reader $r, Context $context)
    {
        $this->r = $r;
        $this->context = $context;
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function eatWithSpace(): int
    {
        $ret = 0;

        if (
            $this->tokenType !== self::WHITESPACE
            && $this->tokenType !== self::EOF
        ) {
            return $ret;
        }

        while (
            $this->nextToken() === self::WHITESPACE
            || $this->tokenType === self::EOL
        ) {
            $ret++;
        }

        return $ret;
    }

    public function getTypeString(int $int = -1): ?string
    {
        if ($int < 0) {
            $int = $this->tokenType();
        }

        if ($int < 0) {
            return null;
        }

        $resolve = [
            self::WORD => 'WORD',
            self::QUOTE => 'QUOTE',
            self::APOS => 'APOS',
            self::WHITESPACE => 'WHITESPACE',
            self::EOL => 'EOL',
            self::CHAR => 'CHAR',
            self::EOF => 'EOF'
        ];

        return $resolve[$int];
    }

    /**
     * @return int
     */
    public function tokenType(): int
    {
        return $this->tokenType;
    }

    /**
     * @return null
     */
    public function token()
    {
        return $this->token;
    }

    /**
     * @return bool
     */
    public function isWord(): bool
    {
        return $this->tokenType === self::WORD;
    }

    /**
     * @return bool
     */
    public function isQuote(): bool
    {
        return $this->tokenType === self::APOS || $this->tokenType === self::QUOTE;
    }

    /**
     * @return int
     */
    public function lineNo(): int
    {
        return $this->lineNo;
    }

    /**
     * @return int
     */
    public function charNo(): int
    {
        return $this->charNo;
    }

    public function __clone()
    {
        $this->r = clone($this->r);
    }

    public function nextToken(): int
    {
        $this->token = null;

        while (! is_bool($char = $this->getChar())) {
            if ($this->isEolChar($char)) {
                $this->token = $this->manageEolChars($char);
                $this->lineNo++;
                $this->charNo = 0;
                $type = self::EOL;

                return $this->tokenType = self::EOL;
            }

            if ($this->isWordChar($char)) {
                $this->token = $this->eatWordChars($char);
                $type = self::WORD;
            } elseif ($this->isSpaceChar($char)) {
                $this->token = $char;
                $type = self::WHITESPACE;
            } elseif ($char === "'") {
                $this->token = $char;
                $type = self::APOS;
            } elseif ($char === '"') {
                $this->token = $char;
                $type = self::QUOTE;
            } else {
                $this->token = $char;
                $type = self::CHAR;
            }

            $this->charNo += strlen($this->token());
            return $this->tokenType = $type;
        }

        return $this->tokenType = self::EOF;
    }

    /**
     * @return array
     */
    public function peekToken(): array
    {
        $state = $this->getState();
        $type = $this->nextToken();

        $token = $this->token();
        $this->setState($state);

        return [$type, $token];
    }

    public function getState(): ScannerState
    {
        $state = new ScannerState();
        $state->lineNo = $this->lineNo;
        $state->charNo = $this->charNo;
        $state->token = $this->token;
        $state->tokenType = $this->tokenType;
        $this->r = clone($this->r);
        $state->context = clone($this->context);

        return $state;
    }

    public function setState(ScannerState $state)
    {
        $this->lineNo = $state->lineNo;
        $this->charNo = $state->charNo;
        $this->token = $state->token;
        $this->tokenType = $state->tokenType;
        $this->r = $state->r;
        $this->context = $state->context;
    }

    public function getChar()
    {
        return $this->r->getChar();
    }

    private function eatWordChars(string $char): string
    {
        $val = $char;

        while ($this->isWordChar($char = $this->getChar())) {
            $val .= $char;
        }

        if ($char) {
            $this->pushBackChar();
        }

        return $val;
    }

    private function eatSpaceChar(string $char): string
    {
        $val = $char;

        while ($this->isSpaceChar($char = $this->getChar())) {
            $val .= $char;
        }

        $this->pushBackChar();

        return $val;
    }

    private function pushBackChar()
    {
        $this->r->pushBackChar();
    }

    private function isWordChar($char): bool
    {
        if (is_bool($char)) {
            return false;
        }

        return preg_match("/[A-Z-a-z0-9_\-]/", $char) === 1;
    }

    private function isSpaceChar($char): bool
    {
        return preg_match("/\t| /", $char) === 1;
    }

    private function isEolChar($char): bool
    {
        return preg_match("/\n|\r/", $char) === 1;
    }

    private function manageEolChars(string $char): string
    {
        if ($char === "\r") {
            $nextChar = $this->getChar();

            if ($nextChar === "\n") {
                return "{$char}{$nextChar}";
            }

            $this->pushBackChar();
        }

        return $char;
    }

    public function getPos(): int
    {
        return $this->r->getPos();
    }
}