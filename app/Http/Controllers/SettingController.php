<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SettingController extends Controller
{
    public function index() {
    	return view ('settings.index');
    }
}
