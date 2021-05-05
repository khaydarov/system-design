<?php

use App\InOrderIterator;
use App\PreOrderIterator;
use App\TreeNode;

require_once './vendor/autoload.php';

// ###################
// ### Binary Tree ###
// ###################
//            1
//          /  \
//         2    3
//       /  \
//      4    5
//    /  \
//   6    7
//
// ####################
$root = new TreeNode(
    1,
    new TreeNode(
        2,
        new TreeNode(
            4,
            new TreeNode(6),
            new TreeNode(7)
        ),
        new TreeNode(5)
    ),
    new TreeNode(3)
);

$iterator = new \App\PostOrderIterator($root);
foreach ($iterator as $item) {
    dump($item);
}

