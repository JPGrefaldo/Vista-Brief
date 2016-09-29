<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function postNewUser(Request $request)
    {
    	$username = $request['username'];
    	$forename = $request['forename'];
    	$surname = $request['surname'];
    	$email = $request['email'];
    	$password = bcrypt($request['password']);

    	$user = new User();
    	$user->username = $username;
    	$user->forename = $forename;
    	$user->surname = $surname;
    	$user->email = $email;
    	$user->password = $password;
    	$user->save();

    	return redirect('/users');
    }

    public function postSignIn()
    {

    }
}
