<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

/**
 * Class SecurityMonitor
 * @package App\Patterns\Observer
 */
class SecurityMonitor extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
//        if ($status === Login::LOGIN_WRONG_PASS) {
            print __CLASS__ . ': send message to security department' . PHP_EOL;
//        }
    }
}