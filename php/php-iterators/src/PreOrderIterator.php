<?php

declare(strict_types=1);

namespace App;

/**
 * Class PreOrderIterator
 * Traversal: root-left-right
 *
 * @package App
 */
final class PreOrderIterator implements \Iterator
{
    /**
     * Root from that traversal starts
     *
     * @var TreeNode
     */
    private $root;

    /**
     * Working node
     *
     * @var TreeNode
     */
    private $current;

    /**
     * Stack: LIFO data structure
     *
     * @var TreeNodeStack
     */
    private $stack;

    /**
     * PreOrderIterator constructor.
     *
     * @param TreeNode $root
     */
    public function __construct(TreeNode $root)
    {
        $this->root = $root;
        $this->current = $root;

        $this->stack = new TreeNodeStack();
        $this->stack->push($this->current);
    }

    /**
     * @return int
     */
    public function current(): int
    {
        return $this->current->getValue();
    }

    /**
     * Moves to the next node
     */
    public function next(): void
    {
        $current = $this->stack->Pop();
        if ($current && $current->getRightNode() !== null) {
            $this->stack->push($current->getRightNode());
        }

        if ($current && $current->getLeftNode() !== null) {
            $this->stack->push($current->getLeftNode());
        }

        $this->current = $this->stack->top();
    }

    /**
     * Stub
     */
    public function key(): void
    {
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return $this->current != null;
    }

    /**
     * Sets current to the root node
     */
    public function rewind()
    {
        $this->current = $this->root;
    }
}