<?php
declare(strict_types=1);

namespace App\Patterns\Command;

/**
 * Interface Command
 * @package App\Patterns\Command
 */
abstract class Command
{
    abstract public function execute(CommandContext $context): bool;
}