<?php

declare(strict_types=1);

namespace App;

/**
 * Class TreeNodeStack
 * LIFO data structure
 *
 * @package App
 */
final class TreeNodeStack
{
    /**
     * @var TreeNode[]
     */
    private $nodes;

    /**
     * TreeNodeStack constructor.
     */
    public function __construct()
    {
        $this->nodes = [];
    }

    /**
     * @param TreeNode $node
     */
    public function push(TreeNode $node)
    {
        $this->nodes[] = $node;
    }

    /**
     * @return TreeNode|null
     */
    public function top(): ?TreeNode
    {
        if (empty($this->nodes)) {
            return null;
        }

        return $this->nodes[count($this->nodes) - 1];
    }

    /**
     * @return TreeNode|null
     */
    public function pop(): ?TreeNode
    {
        if (empty($this->nodes)) {
            return null;
        }

        return array_pop($this->nodes);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return count($this->nodes) === 0;
    }
}