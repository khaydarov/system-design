<?php

declare(strict_types=1);

namespace App;

/**
 * Class DFS
 * Depth-first search
 *
 * @package App
 */
final class DFS implements \Iterator
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
     * DFS constructor.
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
     * Adds node to stack and moves forward
     */
    public function next(): void
    {
        $current = $this->stack->pop();

        if ($current !== null && $current->getLeftNode() !== null) {
            $this->stack->push($current->getLeftNode());
        }

        if ($current !== null && $current->getRightNode() !== null) {
            $this->stack->push($current->getRightNode());
        }

        $this->current = $this->stack->top();
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
        return !$this->stack->isEmpty();
    }

    /**
     * Sets current node to root node
     */
    public function rewind(): void
    {
        $this->current = $this->root;
    }
}