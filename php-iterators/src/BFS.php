<?php

declare(strict_types=1);

namespace App;

/**
 * Class BFS
 * Breath-first search implementation. It is a level-order traversal iterator
 *
 * @package App
 */
final class BFS implements \Iterator
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
     * @var TreeNodeQueue
     */
    private $queue;

    public function __construct(TreeNode $root)
    {
        $this->root = $root;
        $this->current = $root;

        $this->queue = new TreeNodeQueue();
        $this->queue->enqueue($this->current);
    }

    /**
     * @return int
     */
    public function current(): int
    {
        return $this->current->getValue();
    }

    /**
     * Adds left and right nodes of current to the queue
     */
    public function next(): void
    {
        $current = $this->queue->dequeue();

        if ($current !== null && $current->getLeftNode() !== null) {
            $this->queue->enqueue($current->getLeftNode());
        }

        if ($current !== null && $current->getRightNode() !== null) {
            $this->queue->enqueue($current->getRightNode());
        }

        $this->current = $this->queue->front();
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
        return !$this->queue->isEmpty();
    }

    /**
     * Set current to the root
     */
    public function rewind(): void
    {
        $this->current = $this->root;
    }
}