<?php
declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

/**
 * Class CommsManager
 * @package App\Patterns\FactoryMethod
 */
abstract class CommsManager
{
    /**
     * @return string
     */
    abstract public function getHeaderText(): string;

    /**
     * @return ApptEncoder
     */
    abstract public function getApptEncoder(): ApptEncoder;

    /**
     * @return string
     */
    abstract public function getFooterText(): string;
}