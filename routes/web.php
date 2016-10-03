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

Route::group(['middleware' => ['web']], function() {
	Route::get('/', function () {
	    return view('signin');
	});

	Route::get('/signin', function () {
	    //return view('welcome');
	    return view('signin');
	});

	Route::get('/forgotpassword', function () {
	    //return view('welcome');
	    return view('forgotpwd');
	});

	Route::get('/dashboard', function () {
		return view('dashboard');
	});

	Route::get('/users', [
		'uses'	=>	'AdminController@manageUsers',
		'as'	=>	'users'
	]);

	Route::get('/users/new', function () {
		return view('newuser');
	});

	Route::post('/users/new/save', [
		'uses'	=>	'UserController@postNewUser',
		'as'	=>	'postnewuser'
	]);

	/* Brief Routes */
	Route::get('/briefs', [
		'uses'	=>	'BriefController@index',
		'as'	=>	'briefs'
	]);
	
	Route::get('/briefs/new', [
		'uses'	=>	'BriefController@new',
		'as'	=>	'newbrief'
	]);
	/* / Brief Routes */
});



//Route::get('main', 'MainPagesController@main');

//Route::get('home', 'MainPagesController@main');

//Route::get('index', 'MainPagesController@main');

//Auth::routes();

//Route::get('/home', 'HomeController@index');
