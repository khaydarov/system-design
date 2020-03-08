<?php
/**ps
 * Getting args from CLI
 */
$line = trim(fgets(STDIN)); // читает одну строку из STDIN
fscanf(STDIN, "%d\n", $number1); // читает число из STDIN
fscanf(STDIN, "%d\n", $number2); // читает число из STDIN

$c = sqrt($number1 * $number1 + $number2 * $number2);

while (true) {
    $strChar = stream_get_contents(STDIN, 1);
    echo $strChar;
}

/**
 * Installed php7.2.9
 */

/**
 * working with memcached
 */
$memcached = new Memcached();
$memcached->addServer('localhost', 32768);
$memcached->add('key', 'value');
echo $memcached->get('key');
echo PHP_EOL;

/**
 * Working with pcntl
 */
$tasks = [
    0 => function() {
        sleep(3);
        echo 'first' . PHP_EOL;
    },
    1 => function() {
        sleep(1);
        echo 'second' . PHP_EOL;
    },
//    2 => function() {
//        sleep(1);
//        echo 'third' . PHP_EOL;
//    }
];

$start = microtime(true);
foreach ($tasks as $i => $task) {
    $pid = pcntl_fork();

    echo 'iteration' . PHP_EOL;
    echo 'index: ' . $i . PHP_EOL;

    if ($pid === -1) {
        exit("Error forking...\n");
    } else if ($pid) {
//         asdas
    } else if ($pid === 0) {
        echo 'processing...' . PHP_EOL;
        $task();
        exit();
    }
}

$end = microtime(true);
while (pcntl_waitpid(0, $status) !== -1);
print_r($end - $start);
echo PHP_EOL;

?>