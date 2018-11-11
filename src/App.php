<?php

namespace Pilmico;

use DateTime;
use Hoa;
use Pilmico\Model\Feedmill;
use Pilmico\Model\Order;
use Pilmico\Model\OrderList;
use Pilmico\Model\Plant;
use Pilmico\Model\Product;
use Pilmico\Service\OrderListService;
use Pilmico\Service\Planner;
use Pilmico\ValueObject\FeedType;
use Pimple\Container;

class App
{
    public function run(Container $container)
    {
        $plant = new Plant('Iligan Plant', [
            new Feedmill('FM 1', 32, [FeedType::SWINE()]),
            new Feedmill('FM 2', 16, [FeedType::GAME_FOWL(), FeedType::POULTRY()]),
        ]);

        $product1 = new Product('123', 'A', 50.0, FeedType::SWINE());
        $product2 = new Product('234', 'B', 50.0, FeedType::SWINE());
        $product3 = new Product('345', 'C', 25.0, FeedType::POULTRY());
        $product4 = new Product('456', 'D', 25.0, FeedType::GAME_FOWL());

        $oderList = new OrderList([
            new Order('1', '', 'A', $product1, 600, new DateTime, (new DateTime)->modify('+1 day')),
            new Order('2', '', 'A', $product1, 400, new DateTime, (new DateTime)->modify('+2 day')),
            new Order('3', '', 'B', $product1, 300, new DateTime, (new DateTime)->modify('+2 day')),
            new Order('4', '', 'A', $product2, 100, new DateTime, (new DateTime)->modify('+1 day')),
            new Order('5', '', 'C', $product2, 100, new DateTime, (new DateTime)->modify('+4 day')),
            new Order('6', '', 'A', $product3, 50, new DateTime, (new DateTime)->modify('+5 day')),
            new Order('7', '', 'B', $product3, 30, new DateTime, (new DateTime)->modify('+8 day')),
            new Order('8', '', 'C', $product3, 50, new DateTime, (new DateTime)->modify('+10 day')),
            new Order('9', '', 'C', $product4, 10, new DateTime, (new DateTime)->modify('+3 day')),
            new Order('10', '', 'D', $product4, 1000, new DateTime, (new DateTime)->modify('+7 day')),
            new Order('11', '', 'E', $product2, 100, new DateTime, (new DateTime)->modify('+4 day')),
            new Order('12', '', 'F', $product1, 100, new DateTime, (new DateTime)->modify('+3 day')),
        ]);

        $planner = new Planner($plant, $oderList, $container[OrderListService::class]);
        $planner->plan();
    }
}
