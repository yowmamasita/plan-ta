<?php

namespace Pilmico\Service;

use Pilmico\Model\Order;
use Pilmico\Model\OrderList;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class OrderListViaSheetsuService implements OrderListService
{
    private $sheetsuUrl = "https://sheetsu.com/apis/v1.0bu/51a58af92c33";

    /**
     * @param bool $unfulfilled
     * @return OrderList
     */
    public function getAllOrders($unfulfilled = false)
    {
        $result = $this->callSheetsu("GET");
        $orders = new OrderList($result);
        return $orders;
    }

    /**
     * @param string $sku
     * @param bool $unfulfilled
     * @return OrderList
     */
    public function getAllOrdersBySku($sku, $unfulfilled = false)
    {
        $result = $this->callSheetsu("GET", "search", ["sku" => $sku]);
        $orders = new OrderList($result);
        return $orders;
    }

    /**
     * @param $method
     * @param string $path
     * @param bool $data
     * @return mixed
     */
    public function callSheetsu($method, $path = "", $data = false)
    {
        $curl = curl_init();

        $url = $this->sheetsuUrl;

        if($path)
        {
            $url .= $this->sheetsuUrl . "/" . $path;
        }

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result);
    }
}
