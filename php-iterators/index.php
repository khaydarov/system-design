<?php

use App\InOrderIterator;
use App\PreOrderIterator;
use App\TreeNode;

require_once './vendor/autoload.php';

$root = new TreeNode(
    1,
    new TreeNode(
        2,
        new TreeNode(4),
        new TreeNode(5)
    ),
    new TreeNode(3)
);
$iterator = new InOrderIterator($root);

foreach ($iterator as $item) {
    dump($item);
}