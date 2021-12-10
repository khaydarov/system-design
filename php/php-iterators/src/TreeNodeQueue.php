<?php

declare(strict_types=1);

namespace App;

/**
 * Class TreeNodeQueue
 * FIFO data structure
 *
 * @package App
 */
final class TreeNodeQueue
{
    /**
     * List of elements
     *
     * @var array
     */
    private $nodes = [];

    /**
     * Push node to the queue
     *
     * @param TreeNode $node
     */
    public function enqueue(TreeNode $node): void
    {
        $this->nodes[] = $node;
    }

    /**
     * Returns first node
     *
     * @return TreeNode|null
     */
    public function front(): ?TreeNode
    {
        if (count($this->nodes) === 0) {
            return null;
        }

        return $this->nodes[0];
    }

    /**
     * Returns first node and removes it
     *
     * @return TreeNode|null
     */
    public function dequeue(): ?TreeNode
    {
        if (count($this->nodes) === 0) {
            return null;
        }

        return array_shift($this->nodes);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return count($this->nodes) === 0;
    }
}