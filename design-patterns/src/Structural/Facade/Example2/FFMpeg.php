<?php
declare(strict_types=1);

namespace App\Structural\Facade\Example2;

/**
 * Class FFMpeg
 * @package App\Structural\Facade\Example2
 */
class FFMpeg
{
    public static function create(): FFMpeg
    {
        return new self();
    }

    public function open(string $video): void
    {
    }
}