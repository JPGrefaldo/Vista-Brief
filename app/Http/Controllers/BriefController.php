<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Brief;
// use App\Client;
// use App\ProjectStatus;
use App\Department;

class BriefController extends Controller
{
    public function index() 
    {
        $briefs = Brief::isactive()->get();

    	return view ('briefsheets.index', compact('briefs'));
    }

    public function submitted($id) 
    {
        $brief = Brief::find($id); // add isactive validation in the future
        $departments = Department::isactive()->get();

    	return view ('briefsheets.submittedbrief', compact('brief', 'departments'));
    }


}
