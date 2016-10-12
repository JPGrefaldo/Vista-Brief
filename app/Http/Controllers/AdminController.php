<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

use Illuminate\Support\Facades\Auth;
use App\Mail\NewUserMail;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public $newUserRedirectRouteTo = 'users';

    public function manageUsers()
    {
    	$users = User::all();
        foreach ($users as $key => $val) {      /* eclude user:admin from the list */
            if ($users[$key]['username'] == 'admin') {
                unset($users[$key]);
            }
        }
    	return view('admin.users', compact('users'));
    }

    public function formNewUser()
    {
    	return view('admin.newuser');
    }

    public function createNewUser(Request $request, \Illuminate\Mail\Mailer $mailer)
    {
        $request['username'] = strtolower($request['username']);
        //$request['password_admin'] = bcrypt($request['password_admin']);

        $messages = [
            'confirmed' =>  "The passwords you entered don't match.",
            'email'     =>  'The email you entered is not real.',
        ];

        $validator = Validator::make($request->all(),[
            'username'  =>  'bail|required|unique:users',
            'forename'  =>  'bail|required|max:50|alpha',
            'surname'   =>  'bail|required|max:50|alpha',
            'email'     =>  'bail|required|email|unique:users',
            'password'  =>  'bail|required|min:4|confirmed|alpha_num',
            'password_admin'    =>  'bail|required|isadmin|adminpass'
        ], $messages);

        // if validation failes redirect back with error message
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if valid prepare data
    	$username          = $request['username'];
    	$forename          = $request['forename'];
    	$surname           = $request['surname'];
    	$email             = $request['email'];
    	$password          = bcrypt($request['password']);

        // create new user model and save new data
    	$user = new User();
    	$user->username    = $username;
    	$user->forename    = $forename;
    	$user->surname     = $surname;
    	$user->email       = $email;
    	$user->password    = $password;
        $user->type        = 2;
        $user->save();

        // send email to new user's email
        $mailer
            ->to($email)
            ->send(new \App\Mail\NewUserMail($username, $request['password']));

    	return redirect()->route( $this->newUserRedirectRouteTo );
    }
}
