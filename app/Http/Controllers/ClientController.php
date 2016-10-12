<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// use App\Exception\Handler;

class ClientController extends Controller
{
    public function index()
    {
    	return view ('clients.index');
    }

    public function formNewClient()
    {
    	// return view('clients.newclient');
    	// throw new \Symfony\Component\HttpKernel\Exception\HttpException(503);
    	// abort(404, 'invalid action');
    }
}
