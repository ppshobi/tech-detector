<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetectController extends Controller
{
    public function index(Request $request){
    	$this->validate($request, [
        	'domain' => 'required|max:255|url',        
    	]);
    	
    	dd($request->input());
    }
}
