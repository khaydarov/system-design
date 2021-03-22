<?php
declare(strict_types=1);

namespace App\Structural\DependencyInjection;

/**
 * Class DatabaseConnection
 * @package App\Structural\DependencyInjection
 */
class DatabaseConnection
{
    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
    }

    /**
     * @return string
     */
    public function getDns(): string
    {
        return sprintf(
            '%s:%s@%s:%d',
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            $this->configuration->getHost(),
            $this->configuration->getPort()
        );
    }
}