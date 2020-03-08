<?php
declare(strict_types=1);

namespace App\Structural\Composite;

/**
 * Class Form
 * @package App\Structural\Composite
 */
class FormElement implements RenderableInterface
{
    /**
     * @var RenderableInterface[]
     */
    private $elements;

    public function render(): string
    {
        $formCode = '<form>';

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= '</form>';

        return $formCode;
    }

    public function addElement(RenderableInterface $element): self
    {
        $this->elements[] = $element;

        return $this;
    }
}