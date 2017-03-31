<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSearch;

class SearchController extends Controller
{
	
    public function index(){
    	$recent_searches=UserSearch::all();
    	return view('recent_search',compact('recent_searches'));
    }


}
