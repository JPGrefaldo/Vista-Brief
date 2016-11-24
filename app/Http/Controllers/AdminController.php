<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

use Illuminate\Support\Facades\Auth;
use App\Mail\NewUserMail;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateUserRequest;

class AdminController extends Controller
{
    public $newUserRedirectRouteTo = 'users';

    public function manageUsers()
    {
    	$users = User::paginate(20);
        foreach ($users as $key => $val) { /* exclude user:admin from the list */
            if (strtolower($users[$key]['id']) == '1') {
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
        $orig_email = $request['email'];
        $request['email'] .= '@wearevista.co.uk';
        //$request['password_admin'] = bcrypt($request['password_admin']);

        $messages = [
            'confirmed' =>  "The passwords you entered don't match.",
            'email'     =>  'The email you entered is not real.',
        ];

        $validator = Validator::make($request->all(),[
            'username'  =>  'bail|required|max:200|unique:users',
            'forename'  =>  'bail|required|max:50|alpha',
            'surname'   =>  'bail|required|max:50|alpha',
            'email'     =>  'bail|required|max:200|email|unique:users',
            'password'  =>  'bail|required|min:4|max:255|confirmed|alpha_num',
            'password_admin'    =>  'bail|required|max:255|isadmin|adminpass'
        ], $messages);

        // if validation failes redirect back with error message
        if ($validator->fails()) {
            $request['email'] = $orig_email;
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // if valid prepare data
    	$username          = $request['username'];
    	$forename          = $request['forename'];
    	$surname           = $request['surname'];
    	$email             = $request['email'];
    	$password          = bcrypt($request['password']);
        $type              = ($request->input('type') == 'admin') ? 1 : 2;

        // create new user model and save new data
    	$user = new User();
    	$user->username    = $username;
    	$user->forename    = $forename;
    	$user->surname     = $surname;
    	$user->email       = $email;
    	$user->password    = $password;
        $user->type        = $type;
        $user->save();

        // send email to new user's email
        $mailer
            ->to($email)
            ->send(new \App\Mail\NewUserMail($username, $request['password']));

    	return redirect()->route( $this->newUserRedirectRouteTo );
    }

    public function formEditProfile($id) 
    {
        $user = User::find($id);
        $user->email_parts = explode('@', $user->email);

        if ($user->type == 1) {
            $user->typeLabel = 'admin';
        } else {
            $user->typeLabel = 'standard';
        }

        return view('admin.edituser', compact('user'));
    }

    public function postEditProfile(UpdateUserRequest $request) 
    {
        $username          = strtolower($request['username']);
        $forename          = $request['forename'];
        $surname           = $request['surname'];
        $email             = $request['email'];
        if( !empty($request->input('password'))) {
            $password      = bcrypt($request['password']);
        }        
        $type              = ($request->input('type') == 'admin') ? 1 : 2;

        $user = User::find($request->input('user_id'));
        $user->username    = $username;
        $user->forename    = $forename;
        $user->surname     = $surname;
        $user->email       = $email;
        $user->type        = $type;
        if ( !empty($password)) {
            $user->password = $password;
        }
        $user->save();

        return redirect()->route('users')->with('user_edit_success', 'Successfully Updated the account of '.$forename.' '.$surname);
    }

    public function confirmDeleteUser($id) 
    {
        $user = User::find($id);

        return view('admin.confirmdeleteuser', compact('user'));
    }

    public function deleteUser($id) 
    {
        $user = User::find($id);
        $forename = $user->forename;
        $surname = $user->surname;
        $user->delete();

        return redirect()
            ->route('users')
            ->with('user_delete_success', 'Successfully deleted the account of '.$forename.' '.$surname);
    }
}
