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
}
