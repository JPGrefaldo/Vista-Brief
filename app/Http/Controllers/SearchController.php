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
    		->OrWhereClient($keyword)
    		->OrWhereProjectStatus($keyword)
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
    		->paginate(20);

    	return view ('briefsheets.index', compact('briefs', 'keyword'));
    }

    public function quickSearchPlanning(Request $request) 
    {
    	if (empty(trim($request->input('keyword')))) return redirect()->route('planningrequests');

    	$keyword = $request->input('keyword');
    	
    	$plannings = \App\Planning::isactive()
    		->select(DB::raw("*"))
    		->where('title','LIKE','%'.$keyword.'%')
    		->orWhereUser($keyword)
    		->OrWhereClient($keyword)
    		->OrWhereJobStatus($keyword)
    		->OrWhereFormatOfResponse($keyword)
    		->orWhere('contact_name','LIKE','%'.$keyword.'%')
    		->orWhere('contact_email','LIKE','%'.$keyword.'%')
    		->orWhere('contact_landline','LIKE','%'.$keyword.'%')
    		->orWhere('contact_mobile','LIKE','%'.$keyword.'%')
    		->orWhere('budget','LIKE','%'.$keyword.'%')
    		->orWhere('job_specifications','LIKE','%'.$keyword.'%')
    		->latest()
    		->paginate(20);

    	return view ('planningrequests.index', compact('plannings', 'keyword'));
    }

    public function quickSearchUser(Request $request) 
    {
    	if (empty(trim($request->input('keyword')))) return redirect()->route('users');

    	$keyword = $request->input('keyword');

    	$users = \App\User::select(DB::raw("*"))
    		->where('username','LIKE','%'.$keyword.'%')
    		->orWhere('forename','LIKE','%'.$keyword.'%')
    		->orWhere('surname','LIKE','%'.$keyword.'%')
    		->orWhere('email','LIKE','%'.$keyword.'%')
    		->paginate(20);

    	return view ('admin.users', compact('users', 'keyword'));
    }

    public function quickSearchClient(Request $request) 
    {
        if (empty(trim($request->input('keyword')))) return redirect()->route('clients');

        $keyword = $request->input('keyword');

        $clients = \App\Client::isactive()
            ->select(DB::raw("*"))
            ->where('name','LIKE','%'.$keyword.'%')
            ->paginate(20);

        return view ('clients.index', compact('clients', 'keyword'));
    }
}
