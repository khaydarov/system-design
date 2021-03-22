<?php
declare(strict_types=1);

namespace App\Patterns\FrontController;

use App\Patterns\FrontController\Request;

/**
 * Class Command
 * @package App\Patterns\FrontController
 */
abstract class Command
{
    final public function __construct()
    {
    }

    public function execute(Request $request)
    {
        $this->doExecute($request);
    }

    abstract public function doExecute(Request $request);
}