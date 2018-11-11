<?php

namespace Pilmico\Util;

use Pilmico\Model\Order;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class OrdersUtil
{
    /**
     * @param array $orders
     */
    public static function sortOrdersByVolume(array &$orders)
    {
        usort($orders, function (Order $orderA, Order $orderB) {
            $volumeA = $orderA->getQuantity() * $orderA->getProduct()->getWeight();
            $volumeB = $orderB->getQuantity() * $orderB->getProduct()->getWeight();
            if ($volumeA == $volumeB) {
                return 0;
            }
            return ($volumeA < $volumeB) ? -1 : 1;
        });
    }

    /**
     * @param array $orders
     */
    public static function sortOrdersByScore(array &$orders)
    {
        usort($orders, function (Order $orderA, Order $orderB) {
            if ($orderA->getScore() == $orderB->getScore()) {
                return 0;
            }
            return ($orderA->getScore() < $orderB->getScore()) ? -1 : 1;
        });
    }
}
