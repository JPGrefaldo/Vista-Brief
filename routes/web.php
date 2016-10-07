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

//Route::group(['middleware' => ['web']], function() {
	Route::get('/', [
		'uses'	=>	'UserController@formSignin',
		'as'	=>	'signin'
	]);
	/* User */
	Route::get('/signin', [
		'uses'	=>	'UserController@formSignin',
		'as'	=>	'signin'
	]);
	Route::get('/login', [
		'uses'	=>	'UserController@formSignin',
		'as'	=>	'login'
	]);
	Route::post('/signin', [
		'uses'	=>	'UserController@postSignin',
		'as'	=>	'postsignin'
	]);
	Route::get('/postsignin', function(){
		return view('dashboard');
	});

	Route::get('/forgotpassword', function () {
	    //return view('welcome');
	    return view('forgotpwd');
	});
	/* / User */

	Route::get('/dashboard', function () {
		return view('dashboard');
	});

	/* Admin */
	Route::get('/users', [
		'uses'	=>	'AdminController@manageUsers',
		'as'	=>	'users'
	]);
	
	Route::get('/users/new', [
		'uses'	=>	'AdminController@formNewUser',
		'as'	=>	'formnewuser'
	]	);

	Route::post('/users/new/save', [
		'uses'	=>	'AdminController@postNewUser',
		'as'	=>	'postnewuser'
	]);
	/* Admin */

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

	/* Department Ruoting */
	Route::get('/departments', [
		'uses'	=>	'DepartmentController@index',
		'as'	=>	'departments'
	]);
	/* / Department Ruoting */

	/* Clients */
	Route::get('/clients', [
		'uses'	=>	'ClientController@index',
		'as'	=>	'clients'
	]);
	/* / Clients */

	/* Settings */
	Route::get('/settings', [
		'uses'	=>	'SettingController@index',
		'as'	=>	'settings'
	]);
	/* / Settings */

	Route::get('/profile', function() {
		return view ('profile');
	});
//});



//Route::get('main', 'MainPagesController@main');

//Route::get('home', 'MainPagesController@main');

//Route::get('index', 'MainPagesController@main');

//Auth::routes();

//Route::get('/home', 'HomeController@index');
