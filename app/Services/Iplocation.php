<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Iplocation
{
    public function fetchIpLocation($domain)
    {
        $client = new Client(); //GuzzleHttp\Client
        $query_string = "http://api.ipstack.com/{$domain}?access_key=be1ab4fa3e6b96b6b8b23b4ac644a65c";
        return json_decode((string) $client->get($query_string)->getBody());
    }
}
