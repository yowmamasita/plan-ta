<?php

namespace Pilmico\Service;

use Hoa\Ruler\Context;
use Hoa\Ruler\Ruler;
use Pilmico\Model\Feedmill;
use Pilmico\Model\Order;
use Pilmico\Model\OrderList;
use Pilmico\Model\Plan;
use Pilmico\Model\Plant;
use Pilmico\Model\Product;
use Pilmico\Model\Rule;
use Pilmico\Util\OrdersUtil;
use Pilmico\ValueObject\FeedType;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class Planner
{
    const SLA_IN_DAYS = 3;
    const HOURS_IN_A_DAY = 24;

    /**
     * @var Plant
     */
    private $plant;

    /**
     * @var OrderList
     */
    private $orderList;

    /**
     * @var Ruler
     */
    private $ruler;

    /**
     * @var array
     */
    private $rules;

    /**
     * @var OrderListService
     */
    private $orderListService;

    /**
     * @var ProductService
     */
    private $productService;

    /**
     * @param Plant $plant
     * @param OrderList $orderList
     * @param OrderListService $orderListService
     * @param ProductService $productService
     */
    public function __construct(Plant $plant, OrderList $orderList, OrderListService $orderListService, ProductService $productService)
    {
        $this->orderList = $orderList;

        $this->orderListService = $orderListService;
        $this->productService = $productService;

        $this->ruler = new Ruler();
        $this->ruler->getDefaultAsserter()
            ->setOperator('need_tomorrow', function (Order $order) {
                return $order->getPromisedAt()->diff($order->getOrderedAt())->d <= 1;
            })
            ->setOperator('within_sla', function (Order $order) {
                $diffInDays = $order->getPromisedAt()->diff($order->getOrderedAt())->d;
                return $diffInDays > 1 && $diffInDays <= self::SLA_IN_DAYS;
            })
            ->setOperator('outside_sla', function (Order $order) {
                return $order->getPromisedAt()->diff($order->getOrderedAt())->d > self::SLA_IN_DAYS;
            })
            ->setOperator('sku_volume_rank', function (Order $order) {
                $sku = $order->getProduct()->getSku();
            });

        $this->rules = [
            new Rule('order.getProduct().getFeedType() in mill.getAllowedTypes() and need_tomorrow(order)', 1000),
            new Rule('order.getProduct().getFeedType() in mill.getAllowedTypes() and within_sla(order)', 100),
            new Rule('order.getProduct().getFeedType() in mill.getAllowedTypes() and outside_sla(order)', 10),
        ];
    }

    public function plan()
    {
        $plans = [];

        /** @var Feedmill $feedmill */
        foreach ($this->plant->getMills() as $feedmill) {
            $plans[] = new Plan($feedmill);
            $capacity = $feedmill->getCapacity();

            /** @var Product $topProduct */
            foreach ($this->productService->getTopProducts() as $topProduct) {

                $singleSkuOrderList = $this->orderListService->getAllOrdersBySku($topProduct->getSku());
                $singleSkuOrders = $singleSkuOrderList->getOrders();

                OrdersUtil::sortOrdersByVolume($singleSkuOrders);

                /** @var Order $order */
                foreach ($singleSkuOrders as $order) {
                    $context = new Context();
                    $context['order'] = $order;
                    $context['mill'] = $feedmill;

                    /** @var Rule $rule */
                    foreach ($this->rules as $rule)
                    {
                        if ($this->ruler->assert($rule->getStatement(), $context)) {
                            $order->setScore($order->getScore() + $rule->getScore());
                            $volume = $order->getScore() * $order->getProduct()->getWeight();
                            $capacity -= 
                        }
                    }

                    var_dump(
                        $order->getScore()
                    );
                }
            }
        }


    }
}
