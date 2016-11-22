<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Novutec\DomainParser\Parser as DomainParser;
use Novutec\WhoisParser\Parser as WhoisParser;
use Sunra\PhpSimple\HtmlDomParser;


class DetectController extends Controller
{
    public function index(Request $request){
    	$this->validate($request, [
        	'domain' => 'required|max:255|url',        
    	]);
    	$domain = $request->input('domain');    	
		$domain = preg_replace('#^https?://#', '', $domain);
    	$Parser = new WhoisParser('array'); 
    	$result = $Parser->lookup($domain);
    	$ipv4=gethostbynamel($domain);

        $dom = HtmlDomParser::str_get_html($domain);
        dd($dom);
		
        return view('result',compact('domain','result','ipv4'));

    	
    }
}
