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
    	$raw_domain = $request->input('domain');    	
		$domain = preg_replace('#^https?://#', '', $raw_domain);
    	$Parser = new WhoisParser('array'); 
    	$result = $Parser->lookup($domain);
    	$ipv4=gethostbynamel($domain);

        $cms=null;

        $dom = HtmlDomParser::file_get_html($raw_domain);
        foreach($dom->find('img') as $element) 
            echo $element->src . '<br>';
        
       
        
        //return view('result',compact('domain','result','ipv4','dom'));

    	
    }
}
