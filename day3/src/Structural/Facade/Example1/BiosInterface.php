<?php
declare(strict_types=1);

namespace App\Structural\Facade\Example1;

/**
 * Interface BiosInterface
 * @package App\Structural\Facade
 */
interface BiosInterface
{
    public function execute();

    public function waitForKeyPress();

    public function launch(OsInterface $os);

    public function powerDown();
}