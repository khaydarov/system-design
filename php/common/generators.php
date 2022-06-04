<?php

use Khaydarovm\Common\FileReader\Utils;
use Khaydarovm\Common\FileReader\Reader;

require_once 'vendor/autoload.php';

// Reading big file
$reader = new Reader(3 * Reader::SECONDS, 100);

//$lines = $reader->readArray('log.txt');
//$lines = $reader->readGenerator('log.txt');
//foreach ($lines as $line) {}
//echo Utils::formatBytes(memory_get_peak_usage());

// Return function value
//function generator() {
//    for ($i = 1; $i < 10; $i++) {
//        $data = (yield $i => $i * 2);
//        var_dump(sprintf('-----> %s', $data));
//    }
//
//    return 0;
//}

//$generator = generator();
//foreach ($generator as $i => $v) {
//    var_dump(sprintf("%s => %s", $i, $v));
//    $generator->send($i);
//}
//echo $generator->getReturn();

// --------- Yield from ----------- //
//function inner() {
//    yield 1;
//    yield 2;
//    yield 3;
//}
//
//function generator() {
//    yield 0;
//    yield from inner();
//    yield 4;
//}
//
//$generator = generator();
//foreach ($generator as $v) {
//    var_dump($v);
//}
//class CachedGenerator {
//    protected $cache = [];
//    protected Generator $generator;
//
//    public function __construct($generator) {
//        $this->generator = $generator;
//    }
//
//    public function generator() {
//        foreach ($this->cache as $item) yield $item;
//
//        while ($this->generator->valid()) {
//            $current = $this->generator->current();
//            $this->cache[] = $current;
//            $this->generator->next();
//            yield $current;
//        }
//    }
//}
//
//class Foo {
//    protected $loader;
//
//    protected function loadItems() {
//        foreach (range(0, 10) as $i) {
//            yield $i;
//        }
//    }
//
//    public function getItems() {
//        $this->loader = $this->loader ?: new CachedGenerator($this->loadItems());
//        return $this->loader->generator();
//    }
//}
function printer() {
    echo "Hello, I'm printer\n";
    while (true) {
        $string = yield;
        echo $string . PHP_EOL;
    }
}

$printer = printer();
//var_dump($printer->current());
//var_dump($printer->next());
//foreach ($printer as $v) {
//    var_dump($v);
    $printer->send("Hello!");
    $printer->send("Bye");
//}