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
        $clients = \App\Client::isactive()->latest()->get();
        $projectstatus = \App\ProjectStatus::all();
        $departments = \App\Department::all();

    	return view ('briefsheets.index', compact('briefs', 'keyword', 'clients', 'projectstatus', 'departments'));
    }

    public function advanceSearchBrief(Request $request) 
    {
        $jobnumber = $request->input('jobnumber');
        $jobname = $request->input('jobname');
        $client = $request->input('client');
        $projectstatus = $request->input('projectstatus');
        $budget = $request->input('budget');
        $projectmanager = $request->input('projectmanager');
        $departments = $request->input('departments');

        if (
            trim($jobnumber) == '' &&
            trim($jobname) == '' &&
            trim($client) == '' &&
            trim($projectstatus) == '' &&
            trim($budget) == '' &&
            trim($projectmanager) == '' &&
            empty($departments)
            ) {
            return back()->withInput();
        }

        // echo '<p>jobnumber: '.$jobnumber.'</p>';
        // echo '<p>jobname: '.$jobname.'</p>';
        // echo '<p>client: '.$client.'</p>';
        // echo '<p>projectstatus: '.$projectstatus.'</p>';
        // echo '<p>budget: '.$budget.'</p>';
        // echo '<p>projectmanager: '.$projectmanager.'</p>';
        // echo '<pre>';
        // print_r($departments);

        $briefs = \App\Brief::isactive()->select(DB::raw("*"));

        $briefs = empty(trim($jobname)) ? $briefs : $briefs->where('jobname','LIKE','%'.$jobname.'%');
        $briefs = empty(trim($jobnumber)) ? $briefs : $briefs->where('jobnumber','LIKE','%'.$jobnumber.'%');
        $briefs = empty(trim($projectmanager)) ? $briefs : $briefs->where('projectmanager','LIKE','%'.$projectmanager.'%');
        $briefs = empty(trim($budget)) ? $briefs : $briefs->where('budget','LIKE','%'.$budget.'%');
        $briefs = empty($client) ? $briefs : $briefs->where('client_id','=',$client);
        $briefs = empty($projectstatus) ? $briefs : $briefs->where('projectstatus_id','=',$projectstatus);
        $briefs = $briefs->WhereDeparmentWithArray($departments);
        $briefs = $briefs->latest()->paginate(20);

        $clients = \App\Client::isactive()->latest()->get();
        $projectstatus = \App\ProjectStatus::all();
        $departments = \App\Department::all();

        return view ('briefsheets.index', 
            compact(
                'briefs', 
                'clients', 
                'projectstatus', 
                'departments'));
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
