<?php

declare(strict_types=1);

namespace App;

/**
 * Class InOrderIterator
 * @package App
 */
class InOrderIterator implements \Iterator
{
    /**
     * @var TreeNode
     */
    private $root;

    /**
     * @var TreeNode
     */
    private $current;

    /**
     * @var TreeNodeStack
     */
    private $stack;

    /**
     * InOrderIterator constructor.
     * @param TreeNode $root
     */
    public function __construct(TreeNode $root)
    {
        $this->root = $root;
        $this->current = $root;
        $this->stack = new TreeNodeStack();
    }

    /**
     * @return int
     */
    public function current(): int
    {
        $current = $this->current;
        while ($current !== null) {
            $this->stack->push($current);
            $current = $current->getLeftNode();
        }

        $node = $this->stack->top();

        return $node->getValue();
    }

    /**
     * Moves to the next node
     */
    public function next(): void
    {
        $current = $this->stack->pop();
        $this->current = $current->getRightNode();
    }

    /**
     * Stub
     */
    public function key()
    {
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return $this->current !== null || !$this->stack->isEmpty();
    }

    /**
     * Sets current to the root node
     */
    public function rewind(): void
    {
        $this->current = $this->root;
    }
}