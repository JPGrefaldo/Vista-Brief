<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class SearchController extends Controller
{
    public function quickSearchBrief(Request $request) 
    {
    	if (empty(trim($request->input('keyword')))) return redirect()->route('briefsheets');

    	$keyword = $request->input('keyword');

    	$briefs = \App\Brief::isactive()
    		->select(DB::raw("*"))
    		->where('jobname','LIKE','%'.$keyword.'%')
    		->orWhere('jobnumber','LIKE','%'.$keyword.'%')
    		->orWhereUser($keyword)
    		->OrWhereStatus($keyword)
    		->orWhere('projectmanager','LIKE','%'.$keyword.'%')
    		->orWhere('budget','LIKE','%'.$keyword.'%')
    		->orWhere('keydeliverables','LIKE','%'.$keyword.'%')
    		->orWhere('summary','LIKE','%'.$keyword.'%')
    		->orWhere('objectives_or_measures','LIKE','%'.$keyword.'%')
    		->orWhere('content','LIKE','%'.$keyword.'%')
    		->orWhere('targetaudience_and_insight','LIKE','%'.$keyword.'%')
    		->orWhere('targetaudience_think','LIKE','%'.$keyword.'%')
    		->orWhere('targetaudience_feel','LIKE','%'.$keyword.'%')
    		->orWhere('targetaudience_do','LIKE','%'.$keyword.'%')
    		->orWhere('keymessages_or_propositions','LIKE','%'.$keyword.'%')
    		->orWhere('creative','LIKE','%'.$keyword.'%')
    		->orWhere('budget_timings_and_outputs','LIKE','%'.$keyword.'%')
    		->latest()
    		->get();


    	// echo '<pre>';
    	// print_r($briefs);

    	return view ('briefsheets.index', compact('briefs'));
    }
}
