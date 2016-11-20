<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Novutec\DomainParser\Parser as DomainParser;
use Novutec\WhoisParser\Parser as WhoisParser;


class DetectController extends Controller
{
    public function index(Request $request){
    	$this->validate($request, [
        	'domain' => 'required|max:255|url',        
    	]);
    	$domain = $request->input('domain');    	
		$domain = preg_replace('#^https?://#', '', $domain);
    	echo "<h4>The domain </h4>";
    	echo $domain;
    	$Parser = new WhoisParser('array'); 
    	$result = $Parser->lookup($domain);
		//echo $result->created; // get create date of domain name
		echo "<h4>Raw Data </h4>";
		print_r($result); // get raw output as array
    	// dd($request->input());
    }
}
