<?php

declare(strict_types=1);

namespace App;

class Renderer
{
    public function render(string $template, array $data): string
    {
        ob_start();

        extract($data, EXTR_SKIP);

        include $template;

        return ob_get_clean();
    }
}