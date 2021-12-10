<?php

use App\BFS;
use App\DFS;
use App\InOrderIterator;
use App\PostOrderIterator;
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

// [1, 2, 4, 6, 7, 8, 3]
$iterator = new PreOrderIterator($root);
dump("pre-order:");
foreach ($iterator as $item) {
    dump($item);
}

// [6, 4, 7, 2, 5, 1, 3]
$iterator = new InOrderIterator($root);
dump("in-order:");
foreach ($iterator as $item) {
    dump($item);
}

// [6, 7, 4, 5, 2, 3, 1]
$iterator = new PostOrderIterator($root);
dump("post-order:");
foreach ($iterator as $item) {
    dump($item);
}

// [1, 3, 2, 5, 4, 7, 6]
$iterator = new DFS($root);
dump("dfs:");
foreach ($iterator as $item) {
    dump($item);
}

// [1, 2, 3, 4, 5, 6, 7]
$iterator = new BFS($root);
dump("bfs:");
foreach ($iterator as $item) {
    dump($item);
}
