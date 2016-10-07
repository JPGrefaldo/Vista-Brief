<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function formSignin()
    {
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
}
