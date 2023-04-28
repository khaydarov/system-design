<?php

require_once __DIR__ . '/vendor/autoload.php';

$lru = new \Khaydarovm\LRU\LinkedHashMapLRUMemoizer();
$lru->get('a', fn (): string => 'a');
$lru->get('b', fn (): string => 'b');
$lru->get('c', fn (): string => 'c');
$lru->get('a', fn (): string => 'a');
$lru->get('a', fn (): string => 'a');
$lru->get('c', fn (): string => 'c1');

$lru->printItems();
$lru->removeOldest();
$lru->removeOldest();
$lru->removeOldest();
$lru->printItems();