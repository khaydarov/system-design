<?php
declare(strict_types=1);

namespace App\Patterns\FrontController\Request;

use App\Patterns\FrontController\Request;

/**
 * Class HttpRequest
 * @package App\Patterns\FrontController\Request
 */
class HttpRequest extends Request
{
    public function init()
    {
        $this->properties = $_REQUEST;
        $this->path = $_SERVER['PATH_INFO'];
        $this->path = $this->path === '' ? $this->path : '/';
    }
}