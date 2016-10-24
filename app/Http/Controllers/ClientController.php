<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::isactive()->paginate(20);

    	return view ('clients.index', compact('clients'));
    }

    public function formNewClient()
    {
    	// return view('clients.newclient');
    	// throw new \Symfony\Component\HttpKernel\Exception\HttpException(503);
    	// abort(404, 'invalid action');
    }

    public function deleteClient($id) 
    {
        $client = Client::find($id);
        echo $name = $client->name;

        $client->delete();

        return redirect()
            ->route('clients')
            ->with('client_delete_success', 'Successfully deleted the client '.$name);
    }
}
