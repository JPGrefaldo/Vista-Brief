<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function formSignin()
    {
        return view('users.signin');
    }

    public function postSignin(Request $request)
    {
        if ( Auth::attempt(['username'=>$request['username'], 'password'=>$request['password']]) ) {
            return redirect('/dashboard');
        }
        return redirect()->route('signin');
    }    
}
