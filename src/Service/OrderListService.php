<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Pilmico\Service;


use Pilmico\Model\OrderList;

interface OrderListService
{
    /**
     * @param bool $unfulfilled
     * @return OrderList
     */
    public function getAllOrders($unfulfilled = false);

    /**
     * @param string $sku
     * @param bool $unfulfilled
     * @return OrderList
     */
    public function getAllOrdersBySku($sku, $unfulfilled = false);
}
