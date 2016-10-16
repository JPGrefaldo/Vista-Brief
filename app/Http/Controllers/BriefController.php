<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;
use App\ProjectStatus;

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

    	return view ('briefsheets.newbrief', compact('clients', 'projectstatus'));
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
        echo $request->input('projectstatus');
        return;
    }
}
