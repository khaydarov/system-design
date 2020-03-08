<?php
declare(strict_types=1);

namespace App\PropertyObject;

/**
 * Trait PropertiesProcessor
 * @package App\PropertyObject
 */
trait PropertiesProcessor
{
    private AbstractProperties $properties;

    private function fill(array $data): void
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this->properties, $key)) {
                continue;
            }

            $this->properties->{$key} = $value;
        }
    }

    /**
     * @param AbstractProperties $properties
     */
    protected function setProperties(AbstractProperties $properties)
    {
        $this->properties = $properties;
    }

    /**
     * @param string $propertyName
     * @return mixed
     *
     * @throws \Exception
     */
    public function __get(string $propertyName)
    {
        if (!property_exists($this->properties, $propertyName)) {
            throw new \Exception('Property does not exist');
        }

        if (method_exists($this, 'get' . $propertyName)) {
            return $this->{'get' . $propertyName}();
        }

        return $this->properties->{$propertyName};
    }

    /**
     * @param string $propertyName
     * @param $value
     *
     * @return bool
     */
    public function __set(string $propertyName, $value)
    {
        if (method_exists($this, 'set' . $propertyName)) {
            //            return $this->{'set' . $propertyName}($value);
            return false;
        }

        if (
            $this->properties->{$propertyName} !== $value
            && \in_array($propertyName, $this->changedProperties)
        ) {
            $this->changedProperties[] = $propertyName;
        }

        return $this->properties->{$propertyName} = $value;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->propertyTable[$name]);
    }
}