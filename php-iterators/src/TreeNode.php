<?php

declare(strict_types=1);

namespace App;

class TreeNode implements \IteratorAggregate
{
    /**
     * @var int
     */
    private $value;

    /**
     * @var TreeNode
     */
    private $left;

    /**
     * @var TreeNode
     */
    private $right;

    public function __construct(int $value, ?TreeNode $left = null, ?TreeNode $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getLeftNode(): ?TreeNode
    {
        return $this->left;
    }

    public function getRightNode(): ?TreeNode
    {
        return $this->right;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this);
    }
}