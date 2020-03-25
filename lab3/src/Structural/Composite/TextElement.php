<?php
declare(strict_types=1);

namespace App\Structural\Composite;

/**
 * Class TextElement
 * @package App\Structural\Composite
 */
class TextElement implements RenderableInterface
{
    /**
     * @var string
     */
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        return $this->text;
    }
}