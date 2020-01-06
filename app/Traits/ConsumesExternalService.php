<?php

namespace App\Traits;
use GuzzleHttp\Client; 
trait ConsumesExternalService
{
    /**
     * Send a request  to any service
     * @resturn string
     */
    public function performRequest($method, $requestUrl, $formParam = [], $headers =[])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if (isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }

        $response = $client->request($method, $requestUrl, ['form_params' => $formParam, 'headers'=> $headers]);

        return  $response->getBody()->getContents();
    }
}