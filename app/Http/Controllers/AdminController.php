<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $newUserRedirectRouteTo = 'users';

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
        $request['username'] = strtolower($request['username']);
        //$request['password_admin'] = bcrypt($request['password_admin']);

        $this->validate($request, [
            'username'  =>  'bail|required|unique:users',
            'forename'  =>  'bail|required|max:50|alpha',
            'surname'   =>  'bail|required|max:50|alpha',
            'email'     =>  'bail|required|email|unique:users',
            'password'  =>  'bail|required|min:4|confirmed|alpha_num',
            'password_admin'    =>  'bail|required|isadmin|adminpass'
        ])->withInput;

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

    	return redirect()->route( $this->newUserRedirectRouteTo );
    }
}
