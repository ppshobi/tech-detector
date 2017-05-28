<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSearch;
use Auth;

//use Novutec\DomainParser\Parser as DomainParser;
use Novutec\WhoisParser\Parser as WhoisParser;
use Sunra\PhpSimple\HtmlDomParser;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Symfony\Component\Process\Process;

class DetectController extends Controller
{
    public function index(Request $request){
    	$this->validate($request, [
        	'domain' => 'required|max:255|url',        
    	]);

    	$raw_domain = $request->input('domain');
        $domain = preg_replace('#^https?://#', '', $raw_domain);
		$domain = rtrim($domain, '/');
    	$Parser = new WhoisParser('array');
    	$result = $Parser->lookup($domain);

        //ip address
    	$ipv4 = gethostbynamel($domain);

        //ip location
        $client = new Client(); //GuzzleHttp\Client
        $query_string = "http://freegeoip.net/json/".$domain;
        $iplocation = json_decode((string)$client->get($query_string)->getBody());
        $node_cmd = "node js/wap2.js ". $raw_domain;

        //dd($node_cmd);
        $process = new Process($node_cmd);
        $process->run(); // to run Sync
        $tech = $process->getOutput();
        $tech = strstr($tech,'{"url"');
        $technologies = json_decode($tech,true);

        function store($raw_domain){
            if (Auth::check()){
                //if user is logged in then store the url in db,
                $search=new UserSearch();
                $user_id=Auth::id();
                $search->user_id=$user_id;
                $search->url=$raw_domain;
                $search->save();
            }
        }

        store($raw_domain);
        //dd($technologies);
        return view('result',compact('domain','result', 'ipv4','technologies','iplocation'));	
    }

    public function test(){
        $process=new Process("node js/wap2.js http://google.com");
        $process->run();
        dd($process->getOutput());
    }
   
}
