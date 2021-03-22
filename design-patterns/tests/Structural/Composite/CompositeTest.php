<?php
declare(strict_types=1);

use App\Structural\Composite\FormElement;
use App\Structural\Composite\InputElement;
use App\Structural\Composite\TextElement;
use \PHPUnit\Framework\TestCase;

class CompositeTest extends TestCase
{
    public function testDrawHtmlForm()
    {
        $form = new FormElement();
        $form->addElement(new TextElement('Email:'))
            ->addElement(new InputElement())
            ->addElement(new TextElement('Password:'))
            ->addElement(new InputElement());

        $this->assertSame(
            '<form>Email:<input type="text">Password:<input type="text"></form>',
            $form->render()
        );
    }
}