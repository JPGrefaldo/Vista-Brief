<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BriefController extends Controller
{
    public function index() {
    	return view ('briefsheets.index');
    }

    public function new() {
    	return view ('briefsheets.newbrief');
    }

    public function drafted() {
    	return view ('briefsheets.draftedbrief');
    }

    public function submitted() {
    	return view ('briefsheets.submittedbrief');
    }
}
