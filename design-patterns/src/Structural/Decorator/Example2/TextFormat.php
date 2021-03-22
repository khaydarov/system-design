<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example2;

/**
 * Class TextFormat
 * @package App\Structural\Decorator\Example2
 */
abstract class TextFormat implements InputFormat
{
    /**
     * @var InputFormat
     */
    protected $input_format;

    /**
     * TextFormat constructor.
     * @param InputFormat $input_format
     */
    public function __construct(InputFormat $input_format)
    {
        $this->input_format = $input_format;
    }

    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string
    {
        return $this->input_format->formatText($text);
    }
}