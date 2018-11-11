<?php

namespace Pilmico\Service;

use Pilmico\Model\Product;

class ProductViaSheetsuService implements ProductService
{
    private $sheetsuUrl = "https://sheetsu.com/apis/v1.0bu/b60844f85851";

    public function getAllProducts()
    {
        $result = $this->callSheetsu("GET");
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