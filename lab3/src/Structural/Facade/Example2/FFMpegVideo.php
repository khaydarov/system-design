<?php
declare(strict_types=1);

namespace App\Structural\Facade\Example2;

/**
 * Class FFMpegVideo
 * @package App\Structural\Facade\Example2
 */
class FFMpegVideo
{
    public function filters(): self
    {
        return $this;
    }

    public function resize(): self
    {
        return $this;
    }

    public function sync(): self
    {
        return $this;
    }

    public function frame(): self
    {
        return $this;
    }

    public function save(string $path): self
    {
        return $this;
    }
}