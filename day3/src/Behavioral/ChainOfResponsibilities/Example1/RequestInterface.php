<?php
declare(strict_types=1);

namespace App\Behavioral\ChainOfResponsibilities\Example1;

/**
 * Interface RequestInterface
 * @package App\Behavioral\ChainOfResponsibilities
 */
interface RequestInterface
{
    public function getPath(): string;

    public function getQuery(): string;
}