<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Brief;
use App\Client;
use App\ProjectStatus;
use App\Department;

class BriefController extends Controller
{
    public function index() 
    {
        $briefs = Brief::isactive()->get();

    	return view ('briefsheets.index', compact('briefs'));
    }

    // public function drafted() 
    // {
    // 	return view ('briefsheets.draftedbrief');
    // }

    public function submitted() 
    {
    	return view ('briefsheets.submittedbrief');
    }


}
