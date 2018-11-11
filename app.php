<?php
require __DIR__ . '/vendor/autoload.php';

use Pilmico\App;

$container = new Pimple\Container;
$container[\Pilmico\Service\OrderListService::class] = new \Pilmico\Service\OrderListViaSheetsuService;

(new App)->run($container);
