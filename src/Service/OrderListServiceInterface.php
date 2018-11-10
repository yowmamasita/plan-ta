<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Pilmico\Service;


use Pilmico\Model\OrderList;

interface OrderListServiceInterface
{
    /**
     * @return OrderList
     */
    public function getAllOrders();

    /**
     * @param string $sku
     * @return OrderList
     */
    public function getAllOrdersBySku($sku);
}
