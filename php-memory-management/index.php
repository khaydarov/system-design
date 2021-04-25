<?php

use App\LeakCommand;
use Symfony\Component\Console\Application;

require_once './vendor/autoload.php';

//$application = new Application();
//$application->add(new LeakCommand());
//$application->run();

$factory = new \App\InMemoryCachingReportFactory(new \App\HeavyReportFactory());
$baseMemory = memory_get_usage();

for ($i = 0; $i < 1000; $i++) {
    $value = new \App\ValueObject();
    $factory->createReport($value);
}

$actualMemory = memory_get_usage();
dd($baseMemory, $actualMemory);