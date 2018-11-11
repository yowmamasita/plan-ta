<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Plant
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $mills;

    /**
     * @param string $name
     * @param array $mills
     */
    public function __construct($name, array $mills)
    {
        $this->name = $name;
        $this->mills = $mills;
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
     * @return array
     */
    public function getMills()
    {
        return $this->mills;
    }

    /**
     * @param array $mills
     */
    public function setMills($mills)
    {
        $this->mills = $mills;
    }
}
