<?php

namespace App\Traits;

// use GuzzleHttp\Client;
trait ConsumeExternalServices
{
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [], $q = null)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => $this->baseUri]);

        $response = $client->request(
            $method,
            $requestUrl,
            [
                'form_params' => $formParams,
                'headers' => $headers,
            ]);

        $res = $response->getBody();
        $decode = json_decode($res, true);
        $arr = array();

        foreach ($decode as $v) {
            $show = $v["show"];
            $name = $show["name"];
            if (strtolower($q) == strtolower($name)) {
                $arr[] = $v;
            }

            // If we need all record that matches Deadwood(complete Word)
            // $check = stripos($name, $q);
            // if ($check !== false) {
            //     /$arr[] = $v;
            // }
        }
        return $arr;
    }
}