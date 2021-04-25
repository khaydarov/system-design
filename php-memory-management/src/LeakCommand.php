<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LeakCommand extends Command
{
    protected static $defaultName = 'leak';

    private $service;

    public function __construct(string $name = null)
    {
        parent::__construct($name);
        $this->service = new Service();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progressBar = new ProgressBar($output);
        $progressBar->start();
        $progressBar->setFormat('debug');

        for ($i = 1; $i < 1000; $i++) {
            $this->service->add();
            $progressBar->advance();
        }

//        meminfo_dump(fopen('/tmp/php_mem_dump.json', 'w'));

        $progressBar->finish();
        return self::SUCCESS;
    }

    private function debugScopeVars()
    {
        xdebug_debug_zval('this');
    }
}