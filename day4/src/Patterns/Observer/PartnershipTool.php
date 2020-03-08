<?php
declare(strict_types=1);

namespace App\Patterns\Observer;


class PartnershipTool extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();

        print __CLASS__ . ': send cookie file' . PHP_EOL;
    }
}