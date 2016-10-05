<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PlanningController extends Controller
{
    public function index() {
    	return view ('planningrequests.index');
    }

    public function new() {
    	return view ('planningrequests.newplanning');
    }
}
