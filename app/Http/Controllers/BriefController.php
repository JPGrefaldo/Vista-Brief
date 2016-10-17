<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Http\UploadedFile;

use App\Http\Requests;

// use Storage;

use App\Brief;
use App\Client;
use App\ProjectStatus;
use App\Department;

class BriefController extends Controller
{
    public function index() 
    {
        $briefs = Brief::isactive()->get();

        // foreach ($briefs as $brief) {
        //     echo $brief->user->surname;
        // }

    	return view ('briefsheets.index', compact('briefs'));
    }

    public function drafted() 
    {
    	return view ('briefsheets.draftedbrief');
    }

    public function submitted() 
    {
    	return view ('briefsheets.submittedbrief');
    }


}
