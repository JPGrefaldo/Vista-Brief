<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Mail;

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

    public function formresetpassword() {
        return view('users.resetpassword');
    }

    public function postresetpassword(Request $request)
    {
        if (User::where('username', '=', $request->input('username'))->exists()) { // if user doesn't exist return with error
            echo 'In working progress functionality!';

            $user = User::where('username', '=', $request->input('username'))->firstorfail();
            //dd(\Config::get('mail'));

            Mail::send('emails.resetpassword', ['user'=>$user], function($message) use ($user) {
                $message->from('ray.romero@objective.agency', 'Admin - Vista Brief');

                $message->to('ray.romero@objective.agency', 'sample user name')->subject('Reset Password test');
            });

            /*Mail:send('resetpassword', array('user'=>'test user'), function($message) {
                $message->to('ray.romero@objective.agency', 'test name')->subject('test mail subject');
            });*/

            exit();
        }
        else {
            $error = new MessageBag(['invalid_username' => 'Sorry, unable to find your details. Please check and try again']);
            return redirect()->back()->withErrors($error)->withInput();
        }
    }
}
