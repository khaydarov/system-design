<?php
declare(strict_types=1);

namespace App\LSB;

/**
 * Class Document
 * @package App\LSB
 */
class Document extends DomainObject
{
    public function iAmDocument(): string
    {
        return 'iamdocument';
    }

    public static function getGroup(): string
    {
        return 'document';
    }
}