<?php

namespace Pilmico\Model;

use Pilmico\ValueObject\FeedType;

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
     * @var FeedType
     */
    private $feedType;

    /**
     * @param string $sku
     * @param string $name
     * @param float $weight
     * @param FeedType $feedType
     */
    public function __construct($sku, $name, $weight, FeedType $feedType)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->weight = $weight;
        $this->feedType = $feedType;
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

    /**
     * @return FeedType
     */
    public function getFeedType()
    {
        return $this->feedType;
    }

    /**
     * @param FeedType $feedType
     */
    public function setFeedType($feedType)
    {
        $this->feedType = $feedType;
    }
}
