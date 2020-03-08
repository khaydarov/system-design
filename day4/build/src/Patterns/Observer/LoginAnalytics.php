<?php
declare(strict_types=1);

namespace App\Patterns\Observer;

/**
 * Class LoginAnalytics
 * @package App\Patterns\Observer
 */
class LoginAnalytics extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        print __CLASS__ . ': login analytics...';
    }
}