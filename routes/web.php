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
Route::post('/signin', [
	'uses'	=>	'UserController@postSignin',
	'as'	=>	'postsignin'
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

Route::get('/resetpassword', [
	'uses'	=>	'UserController@formresetpassword',
	'as'	=>	'formresetpassword'
]);
Route::post('/resetpassword', [
	'uses'	=>	'UserController@postresetpassword',
	'as'	=>	'postresetpassword'
]);

Route::get('/changepassword', [
	'uses'	=>	'UserController@formchangepassword',
	'as'	=>	'formchangepassword'
]);
Route::post('/changepassword', [
	'uses'	=>	'UserController@updatechangepassword',
	'as'	=>	'updatechangepassword'
]);
/* / Access */


Route::group(['middleware' => 'auth'], function() {
	Route::get('/dashboard', [
		'uses'	=>	'UserController@dashboard',
		'as'	=>	'dashboard'
	]);

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
				'uses'	=>	'AdminController@createNewUser',
				'as'	=>	'createnewuser'
			]);
			
			Route::get('/departments', [	/* Department Ruoting */
				'uses'	=>	'DepartmentController@index',
				'as'	=>	'departments'
			]);

			

			/* Clients */
			Route::get('/clients', [	/* Clients */
				'uses'	=>	'ClientController@index',
				'as'	=>	'clients'
			]);
			Route::get('/clients/new', [	/* NOT IMPLEMENTED YET */
				'uses'	=>	'ClientController@formNewClient',
				'as'	=>	'formnewclient'
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


Route::post('/ajax/departments/new/save', [
	'uses'	=>	'DepartmentController@postNewDepartment',
	'as'	=>	'postnewdepartment'
]);
Route::post('/ajax/departments/edit/save', [
	'uses'	=>	'DepartmentController@postEditDepartment',
	'as'	=>	'posteditdepartment'
]);
Route::post('/ajax/departments/delete', [
	'uses'	=>	'DepartmentController@postDeleteDepartment',
	'as'	=>	'postdeletedepartment'
]);
			
//Route::get('main', 'MainPagesController@main');

//Route::get('home', 'MainPagesController@main');

//Route::get('index', 'MainPagesController@main');

//Auth::routes();

//Route::get('/home', 'HomeController@index');
