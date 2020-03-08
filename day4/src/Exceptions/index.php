<?php
declare(strict_types=1);

namespace App\Exceptions;

require_once '../../vendor/autoload.php';

//die;
try {
    $conf = new Conf('conf.xml');
    $conf->set('user', 'alice');

    $mm = 'ab';

    $conf->write();
} catch (\Exception $e) {
    var_dump($e->getTrace());
}
