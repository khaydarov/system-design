<?php

declare(strict_types=1);

namespace App;

/**
 * Class TreeNode
 *
 * @package App
 */
final class TreeNode
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

    /**
     * TreeNode constructor.
     *
     * @param int $value
     * @param TreeNode|null $left
     * @param TreeNode|null $right
     */
    public function __construct(int $value, ?TreeNode $left = null, ?TreeNode $right = null)
    {
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * Returns node value
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Returns left node
     *
     * @return TreeNode|null
     */
    public function getLeftNode(): ?TreeNode
    {
        return $this->left;
    }

    /**
     * Returns right node
     *
     * @return TreeNode|null
     */
    public function getRightNode(): ?TreeNode
    {
        return $this->right;
    }
}