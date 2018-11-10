<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Feedmill
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var array
     */
    private $allowedTypes;

    /**
     * @param string $name
     * @param int $capacity
     * @param array $allowedTypes
     */
    public function __construct($name, $capacity, array $allowedTypes)
    {
        $this->name = $name;
        $this->capacity = $capacity;
        $this->allowedTypes = $allowedTypes;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return array
     */
    public function getAllowedTypes()
    {
        return $this->allowedTypes;
    }

    /**
     * @param array $allowedTypes
     */
    public function setAllowedTypes($allowedTypes)
    {
        $this->allowedTypes = $allowedTypes;
    }
}
