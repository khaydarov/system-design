<?php

declare(strict_types=1);

namespace App;

/**
 * Class PostOrderIterator
 * Traversal: left-right-root
 *
 * @package App
 */
final class PostOrderIterator implements \Iterator
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
    private $stack1;

    /**
     * @var TreeNodeStack
     */
    private $stack2;

    /**
     * PostOrderIterator constructor.
     *
     * @param TreeNode $root
     */
    public function __construct(TreeNode $root)
    {
        $this->root = $root;

        $this->stack1 = new TreeNodeStack();
        $this->stack1->push($root);

        $this->stack2 = new TreeNodeStack();
    }

    /**
     * @return int
     */
    public function current(): int
    {
        if ($this->stack2->isEmpty() && $this->current === null) {
            $this->fillStack();
        }

        return $this->current->getValue();
    }

    /**
     * Move forward
     */
    public function next(): void
    {
        $this->current = $this->stack2->pop();
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
        return !$this->stack2->isEmpty() || !$this->stack1->isEmpty() || $this->current !== null;
    }

    /**
     * Set current node as root node
     */
    public function rewind(): void
    {
        $this->current = null;
    }

    /**
     * Fills second stack
     */
    public function fillStack(): void
    {
        while (!$this->stack1->isEmpty()) {
            $node = $this->stack1->pop();
            $this->stack2->push($node);

            if ($node->getLeftNode() !== null) {
                $this->stack1->push($node->getLeftNode());
            }

            if ($node->getRightNode() !== null) {
                $this->stack1->push($node->getRightNode());
            }
        }

        $this->current = $this->stack2->pop();
    }
}