<?php
declare(strict_types=1);

namespace App\Behavioral\Command\Example2;

/**
 * Interface CommandInterface
 * @package App\Behavioral\Command\Example2
 */
interface CommandInterface
{
    public function execute(): void;

    public function getId(): int;

    public function getStatus(): int;
}