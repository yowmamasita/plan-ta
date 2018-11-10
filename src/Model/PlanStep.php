<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class PlanStep
{
    /**
     * @var int
     */
    private $rank;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var float
     */
    private $duration;

    /**
     * @param int $rank
     * @param string $sku
     * @param int $quantity
     * @param float $duration
     */
    public function __construct($rank, $sku, $quantity, $duration)
    {
        $this->rank = $rank;
        $this->sku = $sku;
        $this->quantity = $quantity;
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param int $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
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
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param float $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }
}
