<?php

namespace Pilmico\Model;

use DateTimeInterface;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Order
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $group;

    /**
     * @var string
     */
    private $partyName;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var DateTimeInterface
     */
    private $orderedAt;

    /**
     * @var DateTimeInterface
     */
    private $promisedAt;

    /**
     * @var bool
     */
    private $fulfilled;

    /**
     * @var int
     */
    private $score;

    /**
     * @param string $id
     * @param string $group
     * @param string $partyName
     * @param Product $product
     * @param int $quantity
     * @param DateTimeInterface $orderedAt
     * @param DateTimeInterface $promisedAt
     */
    public function __construct(
        $id,
        $group,
        $partyName,
        Product $product,
        $quantity,
        DateTimeInterface $orderedAt,
        DateTimeInterface $promisedAt
    ) {
        $this->id = $id;
        $this->group = $group;
        $this->partyName = $partyName;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->orderedAt = $orderedAt;
        $this->promisedAt = $promisedAt;
        $this->fulfilled = false;
        $this->score = 0;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getPartyName()
    {
        return $this->partyName;
    }

    /**
     * @param string $partyName
     */
    public function setPartyName($partyName)
    {
        $this->partyName = $partyName;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
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
     * @return DateTimeInterface
     */
    public function getOrderedAt()
    {
        return $this->orderedAt;
    }

    /**
     * @param DateTimeInterface $orderedAt
     */
    public function setOrderedAt($orderedAt)
    {
        $this->orderedAt = $orderedAt;
    }

    /**
     * @return DateTimeInterface
     */
    public function getPromisedAt()
    {
        return $this->promisedAt;
    }

    /**
     * @param DateTimeInterface $promisedAt
     */
    public function setPromisedAt($promisedAt)
    {
        $this->promisedAt = $promisedAt;
    }

    /**
     * @return bool
     */
    public function isFulfilled()
    {
        return $this->fulfilled;
    }

    public function fulfill()
    {
        $this->fulfilled = true;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }
}
