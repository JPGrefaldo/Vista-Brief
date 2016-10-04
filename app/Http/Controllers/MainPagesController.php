<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainPagesController extends Controller
{
    public function main() {
    	return view('main');
    }
}
