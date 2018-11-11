<?php
namespace Pilmico\Service;

use Pilmico\Model\Plan;

final class PlanViaFirebaseService
{
    private $firebaseUrl = "https://production-order.firebaseio.com/plans.json";

    /**
     * @param Plan $plan
     * @return bool
     */
    public function savePlan(Plan $plan)
    {
        $jsonPlan = json_encode(get_class_vars($plan));
        $this->callFirebase("POST", $jsonPlan);
        return true;
    }

    /**
     * @param $method
     * @param string $path
     * @param bool $data
     * @return mixed
     */
    public function callFirebase($method, $path = "", $data = false)
    {
        $curl = curl_init();

        if($path)
        {
            $this->firebaseUrl .= "/" . $path;
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
                    $url = sprintf("%s?%s", $this->firebaseUrl, http_build_query($data));
        }

        curl_setopt($curl, CURLOPT_URL, $this->firebaseUrl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);
        if (curl_errno($curl)) { echo 'Error:' . curl_error($curl); }
        curl_close($curl);

        return json_decode($result);
    }
}
