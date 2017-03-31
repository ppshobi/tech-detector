<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSearch;
use Auth;


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
        $meta_tags=get_meta_tags($raw_domain);
        //dd($meta_tags);
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


        //version detection from string
        function get_version($ver_string){
            if (preg_match('/\d+(?:\.\d+)+/', $ver_string, $matches)) { 
                return $matches[0]; //returning the first match 

            }else{
                return "Unknown";
            }
        }
        //cms detection
        // ==================
        function has_wp_content($raw_domain){
            //finding an image url to see wp-content exists
            $dom = HtmlDomParser::file_get_html($raw_domain);
            $img_url = $dom->find('img',1)->src;
            $img_url=(array)explode('/', $img_url); 
            foreach ($img_url as $urls) {
                if ($urls=="wp-content") {
                    return true;
                }
            }
            return false;   
        }
        if(url_exists($url) && has_wp_content($raw_domain)){
            $cms=array('name'=>"Wordpress",'version'=>"Unknown");   
            if (isset($meta_tags['generator']) && preg_match("/^wordpress/i", $meta_tags['generator'])) {
                $cms['version']=get_version($meta_tags['generator']);
            }
            $technologies['cms']=$cms;
            $technologies['programming_language']="PHP";


        }elseif (isset($meta_tags['generator']) && preg_match("/^drupal/i", $meta_tags['generator'])) {
                //drupal
                $cms=array('name'=>"Drupal",'version'=>"Unknown");
                $cms['version']=get_version($meta_tags['generator']);
                $technologies['cms']=$cms;
                $technologies['programming_language']="PHP";
        }
        else{
            $cms = array('name' => "Unknown", 'version'=> "Unknown");
            $technologies['cms']=$cms;
        }
        
        //server information
        // =====================
        $headers = get_headers($raw_domain,1);
       
        
        if (isset($headers['Server'])) {
             $server_info['server']=$headers['Server'];
        }else{
            $server_info['server']='';
        }

        if (isset($headers['X-Powered-By'])) {
            $server_info['poweredby']=$headers['X-Powered-By'];
        }else{
            $server_info['poweredby']='';
        }
        

        //programming language
        if (!isset($technologies['programming_language'])) {
            $technologies['programming_language']="HTML, Javascript, Css";
        }


        function store($url){
            if (Auth::check()){
                //if user is logged in then store the url in db,
                $search=new UserSearch();
                $user_id=Auth::id();
                $search->user_id=$user_id;
                $search->url=$url;
                $search->save();
            }
        }
        store($raw_domain);
        return view('result',compact('domain','result','server_info', 'ipv4','technologies'));
    	
    }

   
}
