<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example1;

/**
 * Class Receiver
 * @package App\Behavioral\Command\Example1
 */
class Receiver
{
    /**
     * @var bool
     */
    private $enable_date = false;

    /**
     * @var string[]
     */
    private $output = [];

    /**
     * @param string $str
     */
    public function write(string $str)
    {
        if ($this->enable_date) {
            $str .= ' [' . date('Y-m-d') . ']';
        }

        $this->output[] = $str;
    }

    /**
     * @return string
     */
    public function getOutput(): string
    {
        return implode("\n", $this->output);
    }

    public function enableDate()
    {
        $this->enable_date = true;
    }

    public function disableDate()
    {
        $this->enable_date = false;
    }
}