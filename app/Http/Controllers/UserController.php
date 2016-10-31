<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
//use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\ResetPasswordMail;
use App\User;
use App\ResetPasswordRequest;

use App\Http\Requests\UpdateUserProfileRequest;


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
        // validate user input:username
        /*$this->validate($request, [
            'username'  =>  'bail|required|exists:users,username'
        ])->withInput;*/


        // check if user exist (issue: duplicate checked)
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

        // check if input: user_id and validation key exist from reset_password_request table
        if (!ResetPasswordRequest::where([['user_id','=',$user->id],['validation_key','=',$request->input('k')]])->isrequested()->exists() ) {
            return view('errors.503'); // TO BE CHANGE ERROR PAGE LATER ON
        }

        $request->session()->put('reset_username', $request->input('u'));
        $request->session()->put('reset_activation_key', $request->input('k'));
        return view('users.changepassword');
    }

    public function updatechangepassword(Request $request)
    {
        $messages = [
            'confirmed' =>  'Password did not matched. Please type again.'
        ];
        $validator = Validator::make($request->all(),[
            'password'  =>  'bail|required|min:4|max:255|confirmed|alpha_num'
        ], $messages);

        // if validation failes redirecct back with custom error message
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // get the user model
        $user = User::where('username','=',session('reset_username'))->firstorfail(); // NEED PROPER ERROR MANAGEMENT
        $user->password = bcrypt($request->password);

        // get the request model
        $reset_pw_request = ResetPasswordRequest::where([['user_id','=',$user->id],['validation_key','=',session('reset_activation_key')]])->isrequested()->firstorfail(); // NEED PROPER ERROR MANAGEMENT
        $reset_pw_request->state = 2;
        
        // save the changes
        $reset_pw_request->save();        
        $user->save();

        // redirect to signin page with alert message
        return redirect()->route('signin')->with('change_pass_success', 'Your new password have been changed. You can now login with your new password.');
    }

    public function profile() 
    {
        return view('users.profile');
    }

    public function postUpdateProfile(UpdateUserProfileRequest $request) {
        $user_id = $request->user()->id;
        $forename = $request->input('forename');
        $surname = $request->input('surname');
        $current_password = $request->input('current_password');

        // echo '<p>'.$user_id.'</p>';
        // echo '<p>'.$forename.'</p>';
        // echo '<p>'.$surname.'</p>';
        // echo '<p>'.$current_password.'</p>';

        $user = User::find($user_id);
        $user->forename = $forename;
        $user->surname = $surname;
        $user->save();

        return redirect()->route('profile')->with('success_profile_changed', 'Profile Changed!');
    }
}
