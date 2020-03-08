<?php
declare(strict_types=1);

use App\Behavioral\State\Example1\OrderContext;
use PHPUnit\Framework\TestCase;

class StateTest extends TestCase
{
    public function testIsCreatedWithStateCreated()
    {
        $order_context = OrderContext::create();

        $this->assertSame('created', $order_context->toString());
    }

    public function testCanProceedToStateShipped()
    {
        $order_context = OrderContext::create();
        $order_context->proceedToNext();

        $this->assertSame('shipped', $order_context->toString());
    }

    public function testCanProceedToStateDone()
    {
        $order_context = OrderContext::create();
        $order_context->proceedToNext();
        $order_context->proceedToNext();

        $this->assertSame('done', $order_context->toString());
    }

    public function testStateDoneIsTheLastPossibleState()
    {
        $order_context = OrderContext::create();
        $order_context->proceedToNext();
        $order_context->proceedToNext();
        $order_context->proceedToNext();

        $this->assertSame('done', $order_context->toString());
    }
}