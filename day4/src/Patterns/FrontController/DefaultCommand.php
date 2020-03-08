<?php
declare(strict_types=1);

namespace App\Patterns\FrontController\Command;

use App\Patterns\FrontController\Command;
use App\Patterns\FrontController\Request;

/**
 * Class DefaultCommand
 * @package App\Patterns\FrontController
 */
class DefaultCommand extends Command
{
    public function doExecute(Request $request)
    {
        $request->addFeedback("Hello, world");
    }
}