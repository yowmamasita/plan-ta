<?php

namespace Pilmico\Model;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class OrderList
{
    /**
     * @var array
     */
    private $orders;

    /**
     * @param array $orders
     */
    public function __construct(array $orders)
    {
        $this->orders = $orders;
    }

    /**
     * @param Order $order
     */
    public function addOrder(Order $order)
    {
        $this->orders[] = $order;
    }

    /**
     * @return mixed
     */
    public function isAllFulfilled()
    {
        return array_reduce(
            $this->orders,
            function ($allFulfilled, Order $order) {
                return $allFulfilled === $order->isFulfilled();
            },
            true
        );
    }
}
