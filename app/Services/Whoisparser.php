<?php

namespace App\Services;

use Novutec\WhoisParser\Parser;

class WhoisParser
{
    public function getLookupDetails()
    {
        $raw_domain = request()->input('domain');
        $domain = preg_replace('#^https?://#', '', $raw_domain);
        $domain = rtrim($domain, '/');
        $Parser = new Parser('array');
        return $Parser->lookup($domain);
    }
}
