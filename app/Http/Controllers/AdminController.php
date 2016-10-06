<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class AdminController extends Controller
{
    //public newUserRedirectTo = '/users';

    public function manageUsers() {
    	$users = User::all();

    	return view('users.index', compact('users'));
    }

    public function formNewUser() {
    	return view('users.newuser');
    }

    public function postNewUser(Request $request)
    {
    	$username          = $request['username'];
    	$forename          = $request['forename'];
    	$surname           = $request['surname'];
    	$email             = $request['email'];
    	$password          = bcrypt($request['password']);

    	$user = new User();
    	$user->username    = $username;
    	$user->forename    = $forename;
    	$user->surname     = $surname;
    	$user->email       = $email;
    	$user->password    = $password;
        $user->type        = 2;
        $user->save();

    	return redirect()->route('users');
    }

    public function postSignIn()
    {

    }
}
