<?php
declare(strict_types=1);

namespace App\Reflection;

require_once '../../vendor/autoload.php';

$reflection = new \ReflectionClass(Product::class);
eval(\Psy\sh());