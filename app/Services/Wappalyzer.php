<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Wappalyzer
{
    public function getResourceInformation()
    {
        $raw_domain = request()->input('domain');
        $client = new Client();
        return json_decode($client->request('GET', "https://api.wappalyzer.com/analyze/v1/?url={$raw_domain}", [
            'headers' => [
                'X-Api-Key' => 'wappalyzer.api.demo.key',
                'Accept'     => 'application/json',
            ]
        ])->getBody(), true);
    }
}
