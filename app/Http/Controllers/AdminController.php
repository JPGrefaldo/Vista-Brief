<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $newUserRedirectTo = '/users';

    public function manageUsers() {
    	$users = User::all();
        foreach ($users as $key => $val) {      /* eclude user:admin from the list */
            if ($users[$key]['username'] == 'admin') {
                unset($users[$key]);
            }
        }
    	return view('admin.users', compact('users'));
    }

    public function formNewUser() {
    	return view('admin.newuser');
    }

    public function postNewUser(Request $request)
    {
        $this->validate($request, [
            'username'  =>  'required|unique:users',
            'forename'  =>  'required|max:50',
            'surname'   =>  'required|max:50',
            'email'     =>  'required|email|unique:users',
            'password'  =>  'required|min:4|confirmed',
            'password_admin'    =>  'required'
        ]);

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

        //Auth::login($user);

    	return redirect()->route( $this->newUserRedirectTo );
    }
}
