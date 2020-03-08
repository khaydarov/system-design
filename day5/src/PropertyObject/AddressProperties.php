<?php
declare(strict_types=1);

namespace App\PropertyObject;

/**
 * Class AddressProperties
 * @package App\PropertyObject
 */
class AddressProperties extends AbstractProperties
{
    /**
     * @var string
     */
    public $address = '';

    /**
     * @var string
     */
    public $phone = '';

    /**
     * @var string
     */
    public $city = 'Beijing';
}