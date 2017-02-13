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

        $technologies=[];

        function url_exists($url) {
            $handle = curl_init($url);
            curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

            if($httpCode >= 200 && $httpCode <= 400) {
                return true;
            } else {
                return false;
            }

            curl_close($handle);
        }
        $url=$domain;
        $url=$url."/wp-admin";
        //cms detection
        if(url_exists($url)){
            $technologies['cms']="Wordpress";
        }else{
            $technologies['cms']="Unable to detect";
        }
        
        //programming language
        if ($technologies['cms']=="Wordpress") {
            $technologies['programming_language']="PHP";
        }else{
            $technologies['programming_language']="HTML"
        }

        //$dom = HtmlDomParser::file_get_html($raw_domain);
       // foreach($dom->find('img') as $element) 
         //   echo $element->src . '<br>';       
        
        return view('result',compact('domain','result','ipv4','technologies'));

    	
    }
}
