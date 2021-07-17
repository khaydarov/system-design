<?php

declare(strict_types=1);

namespace App\CompilerPass;

use Aura\Sql\ExtendedPdo;
use Aura\Sql\Profiler\Profiler;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Translation\Loader\PoFileLoader;
use Symfony\Contracts\Translation\TranslatorInterface;

class PdoProfilerCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $pdoDefinition = $container->findDefinition(ExtendedPdo::class);
        $pdoDefinition
            ->addMethodCall('connect', []);

        $profilerDefinition = $container->findDefinition(Profiler::class);
        $profilerDefinition->addMethodCall('setActive', [true]);

        $pdoDefinition
            ->addMethodCall('setProfiler', [$profilerDefinition]);
    }
}