<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
//use Illuminate\Support\Facades\Mail;

use App\Mail\ResetPasswordMail;
use App\User;
use App\ResetPasswordRequest;


class UserController extends Controller
{
    public function formSignin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('users.signin');
    }

    public function postSignin(Request $request)
    {
        if ( Auth::attempt(['username'=>strtolower($request['username']), 'password'=>$request['password']]) ) {
            return redirect('/dashboard');
        }
        $error = new MessageBag(['invalid_login'=>['Username or Password is incorrect']]);
        return redirect()->route('signin')->withErrors($error)->withInput();
    }

    public function signout()
    {
        Auth::logout();
        return redirect()->route('signin');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function formresetpassword()
    {
        return view('users.resetpassword');
    }

    public function postresetpassword(Request $request, \Illuminate\Mail\Mailer $mailer)
    {
        if (User::where('username', '=', $request->input('username'))->exists()) { 

            $user = User::where('username', '=', $request->input('username'))->firstorfail();
            $reset_pw_request = new ResetPasswordRequest();
            $reset_pw_request->user_id = $user->id;
            $reset_pw_request->validation_key = str_random(30);
            $reset_pw_request->save();
            
            $mailer
                ->to($user->email)
                ->send(new \App\Mail\ResetPasswordMail($request,$reset_pw_request->validation_key));
            
            return redirect()->back()->with('status', 'Success! Check your email to complete resetting your password.');
        }
        else { // if user doesn't exist return with error
            $error = new MessageBag(['invalid_username' => 'Sorry, unable to find your details. Please check and try again']);
            return redirect()->back()->withErrors($error)->withInput();
        }
    }

    public function formchangepassword(Request $request)
    {
        // check if input username exist
        if (User::where('username', '=', $request->input('u'))->exists()) {
            $user = User::where('username', '=', $request->input('u'))->firstorfail();
        } else {
            return view('errors.503'); // TO BE CHANGE ERROR PAGE LATER ON
        }

        // check if input: user_id and vaidation key exist from reset_password_request table
        if (!ResetPasswordRequest::where([['user_id','=',$user->id],['validation_key','=',$request->input('k')]])->isrequested()->exists() ) {
            return view('errors.503'); // TO BE CHANGE ERROR PAGE LATER ON
        }
        return view('users.changepassword');
    }

    public function postchangepassword(Request $request) {
        echo 'functionality in working progress';
    }
}
