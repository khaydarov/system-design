<?php

declare(strict_types=1);

namespace App\Entity;

interface ValidationHandler
{
    public function handleError($error);
}