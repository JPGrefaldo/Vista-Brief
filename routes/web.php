<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* Access */
Route::get('/', [
	'uses'	=>	'UserController@formSignin',
	'as'	=>	'signin'
]);

Route::get('/signin', [
	'uses'	=>	'UserController@formSignin',
	'as'	=>	'signin'
]);
Route::get('/login', [
	'uses'	=>	'UserController@formSignin',
	'as'	=>	'login'
]);
Route::get('/signout', [
	'uses'	=>	'UserController@signout',
	'as'	=>	'signout'
]);
Route::get('/logout', [
	'uses'	=>	'UserController@signout',
	'as'	=>	'logout'
]);


Route::post('/signin', [
	'uses'	=>	'UserController@postSignin',
	'as'	=>	'postsignin'
]);
//Route::get('/postsignin', function(){
//	return view('dashboard');
//});

Route::get('/resetpassword', [
	'uses'	=>	'UserController@formresetpassword',
	'as'	=>	'formresetpassword'
]);
Route::post('/resetpassword', [
	'uses'	=>	'UserController@postresetpassword',
	'as'	=>	'postresetpassword'
]);
Route::post('/testmail', function(\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer){


	//if (User::where('username', '=', $request->input('username'))->exists()) { // if user doesn't exist return with error
        echo 'In working progress functionality!';

        //$user = User::where('username', '=', $request->input('username'))->firstorfail();
        //dd(\Config::get('mail'));

        $mailer
            ->to('ray.romero@objective.agency')
            ->send(new \App\Mail\ResetPasswordMail());

        /*Mail::send('emails.resetpassword', ['user'=>$user], function($message) use ($user) {
            $message->from('ray.romero@objective.agency', 'Admin - Vista Brief');

            $message->to('ray.romero@objective.agency', 'sample user name')->subject('Reset Password test');
        });

        /*Mail:send('resetpassword', array('user'=>'test user'), function($message) {
            $message->to('ray.romero@objective.agency', 'test name')->subject('test mail subject');
        });*/

        exit();
    //}
   // else {
        //$error = new MessageBag(['invalid_username' => 'Sorry, unable to find your details. Please check and try again']);
        //return redirect()->back();
    //}
})->name('testmail');
/* / Access */


Route::group(['middleware' => 'auth'], function() {
	Route::get('/dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	/* Brief Routes */
	Route::get('/briefsheets', [
		'uses'	=>	'BriefController@index',
		'as'	=>	'briefsheets'
	]);
	Route::get('/briefsheets/new', [
		'uses'	=>	'BriefController@new',
		'as'	=>	'newbriefsheet'
	]);
	Route::get('/briefsheets/draft', [
		'uses'	=>	'BriefController@drafted',
		'as'	=>	'draftedbriefsheet'
	]);
	Route::get('/briefsheets/tempbriefid', [
		'uses'	=>	'BriefController@submitted',
		'as'	=>	'submittedbriefsheet'
	]);
	/* / Brief Routes */

	/* Planning Requests */
	Route::get('/planningrequests', [
		'uses'	=>	'PlanningController@index',
		'as'	=>	'planningrequests'
	]);
	
	Route::get('/planningrequests/new', [
		'uses'	=>	'PlanningController@new',
		'as'	=>	'newplanningrequest'
	]);
	/* / Planning Requests */

	Route::group(['middleware' => ['admin']], function() {	/* Admin Middleware */
		Route::group(['prefix' => 'admin'], function () {
			Route::get('/users', [	/* Users */
				'uses'	=>	'AdminController@manageUsers',
				'as'	=>	'users' 
			]);
			
			Route::get('/users/new', [
				'uses'	=>	'AdminController@formNewUser',
				'as'	=>	'formnewuser'
			]);

			Route::post('/users/new/save', [
				'uses'	=>	'AdminController@postNewUser',
				'as'	=>	'postnewuser'
			]);
			
			Route::get('/departments', [	/* Department Ruoting */
				'uses'	=>	'DepartmentController@index',
				'as'	=>	'departments'
			]);
			
			Route::get('/clients', [	/* Clients */
				'uses'	=>	'ClientController@index',
				'as'	=>	'clients'
			]);
		});
	});	/* / Admin Middleware */
	
	Route::get('/settings', [	/* Settings */
		'uses'	=>	'SettingController@index',
		'as'	=>	'settings'
	]);

	Route::get('/profile', function() {
		return view ('profile');
	});
});



//Route::get('main', 'MainPagesController@main');

//Route::get('home', 'MainPagesController@main');

//Route::get('index', 'MainPagesController@main');

//Auth::routes();

//Route::get('/home', 'HomeController@index');
