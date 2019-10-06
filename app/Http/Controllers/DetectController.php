<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetectRequest;
use App\Services\Iplocation;
use App\Services\Wappalyzer;
use App\Services\WhoisParser;
use App\UserSearch;

class DetectController
{
    public function __construct(WhoisParser $whoisparserService, Iplocation $ipLocationService, Wappalyzer $wappalyzerService)
    {
        $this->whoisparserService = $whoisparserService;
        $this->ipLocationService = $ipLocationService;
        $this->wappalyzerService = $wappalyzerService;
    }

    public function index(DetectRequest $request, UserSearch $userSearch)
    {
        $result = $this->whoisparserService->getLookupDetails();
        $domain = $result['name'];
        $ipv4 = gethostbynamel($domain);
        $iplocation = $this->ipLocationService->fetchIpLocation($domain);
        $technologies = $this->wappalyzerService->getResourceInformation()['applications'];
        $userSearch->storeRecentSearch($domain);
        return view('result', compact('domain', 'result', 'ipv4', 'technologies', 'iplocation'));
    }
}
