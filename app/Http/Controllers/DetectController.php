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

        function wp_admin_url_exists($domain) {
            $wp_url=$domain . "/wp-admin/";

            if (!$fp = curl_init($wp_url)) 
                return false;
            return true;
        }

        if(wp_admin_url_exists($domain)){
            $technologies['cms']="Wordpress";
        }

        $dom = HtmlDomParser::file_get_html($raw_domain);
       // foreach($dom->find('img') as $element) 
         //   echo $element->src . '<br>';

       
        
        return view('result',compact('domain','result','ipv4','technologies'));

    	
    }
}
