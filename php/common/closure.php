<?php

use Khaydarovm\Common\Closure\MetaTrait;

include 'vendor/autoload.php';

// Basic usage
$closure = function () {
    echo 'hello world!';
};

// Binding to class
class A {
    public $foo = 'foo';
    public static $bar = 'bar';
}

class B {}

$c1 = function () {
    return 'Foo is:' . $this->foo;
};

$a = new A();
$b = new B();
$c2 = Closure::bind($c1, $a);
$c3 = Closure::bind($c2, $b);
var_dump($c1, $c2, $c2(), $a, $c3());

// Complex example with adding method on the fly
class C {
    use MetaTrait;
}

$b = new C();
$b->addMethod('do', function() {
    echo 'doing...' . PHP_EOL;
});

$b->do();

