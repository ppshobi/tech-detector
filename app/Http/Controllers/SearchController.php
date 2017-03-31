<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSearch;
use Auth;

class SearchController extends Controller
{
	
    public function index(){
    	$user_id=Auth::id();
    	$recent_searches=UserSearch::all();
    	return view('recent_search')->with('recent_searches',$recent_searches);
    }
    

}
