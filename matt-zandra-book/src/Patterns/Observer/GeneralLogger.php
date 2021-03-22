<?php
declare(strict_types=1);

namespace App\Patterns\Observer;


class GeneralLogger extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        print __CLASS__ . ': logging attempt' . PHP_EOL;
    }
}