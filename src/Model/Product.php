<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Product
{
    /**
     * @var string
     */
    private $sku;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $weight;

    /**
     * @param string $sku
     * @param string $name
     * @param float $weight
     */
    public function __construct($sku, $name, $weight)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
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
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
}
