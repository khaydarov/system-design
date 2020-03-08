<?php
declare(strict_types=1);

namespace App\Patterns\FactoryMethod;

/**
 * Class BloggsCommsManager
 * @package App\Patterns\FactoryMethod
 */
class BloggsCommsManager extends CommsManager
{
    /**
     * @return string
     */
    public function getHeaderText(): string
    {
        return 'header text';
    }

    /**
     * @return ApptEncoder
     */
    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }

    /**
     * @return string
     */
    public function getFooterText(): string
    {
        return 'footer text';
    }
}