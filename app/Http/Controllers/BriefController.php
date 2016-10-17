<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;
use App\ProjectStatus;
use App\Department;

class BriefController extends Controller
{
    public function index() 
    {
    	return view ('briefsheets.index');
    }

    public function new() 
    {
        $clients = Client::isactive()->get();
        $projectstatus = ProjectStatus::all();
        $departments = Department::isactive()->get();

    	return view ('briefsheets.newbrief', compact('clients', 'projectstatus', 'departments'));
    }

    public function drafted() 
    {
    	return view ('briefsheets.draftedbrief');
    }

    public function submitted() 
    {
    	return view ('briefsheets.submittedbrief');
    }

    public function postNewBrief(Request $request) 
    {
        echo '<p>client: '.$request->input('client').'</p>';
        echo '<p>projectstatus: '.$request->input('projectstatus').'</p>';
        echo '<p>jobnumber: '.$request->input('jobnumber').'</p>';
        echo '<p>oldjobnumber: '.$request->input('oldjobnumber').'</p>';
        echo '<p>budget: '.$request->input('budget').'</p>';
        echo '<p>pmanager: '.$request->input('pmanager').'</p>';
        echo '<p>jobname: '.$request->input('jobname').'</p>';
        echo '<p>keydeliverables: '.$request->input('keydeliverables').'</p>';
        echo '<p>Quote Required by: '.$request->input('quotereq').'</p>';
        echo '<p>Proposed Required by: '.$request->input('proposedreq').'</p>';
        echo '<p>1st Stage Required by: '.$request->input('stagereq').'</p>';
        echo '<p>Projects Delivered by: '.$request->input('projdelivered').'</p>';
        echo '<p>Summary: '.$request->input('summary').'</p>';

        $str_departments = (is_array($request->input('department'))) ? implode($request->input('department'),',') : $request->input('department');  
        echo '<p>Department: '.$str_departments.'</p>';
        echo '<p>Objectives / Measure: '.$request->input('objmeasure').'</p>';
        echo '<p>Context: '.$request->input('context').'</p>';
        echo '<p>Target Audience and Insight: '.$request->input('targetaudience_insight').'</p>';
        echo '<p>Target Audience - Think: '.$request->input('targetaudience_think').'</p>';
        echo '<p>Target Audience - Feel: '.$request->input('targetaudience_feel').'</p>';
        echo '<p>Target Audience - Do: '.$request->input('targetaudience_do').'</p>';
        echo '<p>Key Messages / Propositions: '.$request->input('keymsg_propositions').'</p>';
        echo '<p>Creative: '.$request->input('creative').'</p>';
        echo '<p>Budget, Timings and Outputs Required: '.$request->input('budget_timings_outputs_req').'</p>';
        echo '<p>'.$request->input('client').'</p>';
        return;
    }
}
