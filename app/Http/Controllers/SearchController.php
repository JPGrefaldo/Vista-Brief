<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function quickSearchBrief(Request $request) 
    {
    	echo $criteria = $request->input('input_quick_search');

    }
}
