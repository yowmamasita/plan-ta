<?php

namespace Pilmico\Service;

use Pilmico\Model\OrderList;

/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */
final class OrderListViaSheetsuService implements OrderListService
{
    private $sheetsuUrl = "https://sheetsu.com/apis/v1.0bu/51a58af92c33";

    public function getAllOrders()
    {
        $result = $this->callSheetsu("GET");
        return $result;
    }

    public function getAllOrdersBySku($sku)
    {
        $result = $this->callSheetsu("GET", "search", ["sku" => $sku]);
        return $result;
    }

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
