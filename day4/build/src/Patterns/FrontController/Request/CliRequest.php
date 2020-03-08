<?php
declare(strict_types=1);

namespace App\Patterns\FrontController\Request;

use App\Patterns\FrontController\Request;

class CliRequest extends Request
{
    public function init()
    {
        $args = $_SERVER['argv'];
//        foreach ($args as $arg) {
//             ..
//        }

        $this->path = $this->path === '' ? $this->path : '/';
    }
}