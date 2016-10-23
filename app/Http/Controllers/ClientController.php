<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::isactive()->get();

    	return view ('clients.index', compact('clients'));
    }

    public function formNewClient()
    {
    	// return view('clients.newclient');
    	// throw new \Symfony\Component\HttpKernel\Exception\HttpException(503);
    	// abort(404, 'invalid action');
    }
}
