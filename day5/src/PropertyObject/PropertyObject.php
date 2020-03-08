<?php
declare(strict_types=1);

namespace App\PropertyObject;

/**
 * Class PropertyObject
 * @package App\PropertyObject
 */
abstract class PropertyObject implements Validator
{
    use PropertiesProcessor;

    /**
     * @var array
     */
    protected array $changedProperties = [];

    /**
     * @var array
     */
    protected array $data = [];

    public function __construct(AbstractProperties $properties, array $data)
    {
        $this->setProperties($properties);
        $this->fill($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        return true;
    }
}