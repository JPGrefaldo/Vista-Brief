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
	Route::get('/briefsheets/post/create', [
		'uses'	=>	'BriefAddEditController@new',
		'as'	=>	'newbriefsheet'
	]);
	Route::post('/briefsheets/post/save', [
		'uses'	=>	'BriefAddEditController@postNewBrief',
		'as'	=>	'postnewbrief'
	]);
	Route::get('/briefsheets/draft/{id}', [
		'uses'	=>	'BriefAddEditController@formEditBrief',
		'as'	=>	'formeditbrief'
	]);
	Route::post('/briefsheets/draft/save', [
		'uses'	=>	'BriefAddEditController@postEditBrief',
		'as'	=>	'posteditbrief'
	]);
	Route::get('/briefsheets/{id}', [
		'uses'	=>	'BriefController@submitted',
		'as'	=>	'submittedbriefsheet'
	]);
	Route::post('/briefsheets/amend/save', [
		'uses'	=>	'BriefController@postNewAmend',
		'as'	=>	'postnewamend'
	]);
	Route::get('/briefsheets/find/criteria', [
		'uses'	=>	'SearchController@quickSearchBrief',
		'as'	=>	'quicksearchbrief'
	]);
	Route::get('/briefsheets/advancesearch/criteria', [
		'uses'	=>	'SearchController@advanceSearchBrief',
		'as'	=>	'advancesearchbrief'
	]);
	/* / Brief Routes */

	/* Planning Requests */
	Route::get('/planningrequests', [
		'uses'	=>	'PlanningController@index',
		'as'	=>	'planningrequests'
	]);
	Route::get('/planningrequests/post/create', [
		'uses'	=>	'PlanningController@new',
		'as'	=>	'newplanningrequest'
	]);
	Route::post('/planningrequests/post/save', [
		'uses'	=>	'PlanningController@postNewPlanning',
		'as'	=>	'postnewplanning'
	]);
	Route::get('/planningrequests/{id}', [
		'uses'	=>	'PlanningController@submitted',
		'as'	=>	'submittedplanningrequest'
	]);
	Route::get('/planningrequests/find/criteria', [
		'uses'	=>	'SearchController@quickSearchPlanning',
		'as'	=>	'quicksearchplanning'
	]);
	/* / Planning Requests */

	/* PDF Generator: Test Controller */
	Route::get('/pdf/file/{id}', [
		'uses'	=> 'PdfController@get_pdfSubmittedPlanningAttachment',
		'as'	=>	'pdfbriefsubmit'
	]);
	/* / PDF Generator */

	/* Attachment */
	Route::get('/attachment/{id}', [
		'uses'	=> 'AttachmentController@download',
		'as'	=> 'download_attachment'
	]);
	/* / Attachment */

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
			Route::get('/user/edit/{id}', [
				'uses'	=>	'AdminController@formEditProfile',
				'as'	=>	'formeditprofile'
			]);
			Route::post('/user/edit/update', [
				'uses'	=>	'AdminController@postEditProfile',
				'as'	=>	'posteditprofile'
			]);
			Route::get('/user/confirmdelete/{id}', [
				'uses'	=>	'AdminController@confirmDeleteUser',
				'as'	=>	'confirmdeleteuser'
			]);
			Route::post('/user/delete/', [
				'uses'	=>	'AdminController@deleteUser',
				'as'	=>	'deleteuser'
			]);
			Route::get('/users/find/criteria', [
				'uses'	=>	'SearchController@quickSearchUser',
				'as'	=>	'quicksearchuser'
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
			Route::get('/clients/delete/{id}', [
				'uses'	=>	'ClientController@deleteClient',
				'as'	=>	'deleteclient'
			]);
			Route::get('/clients/find/criteria', [
				'uses'	=>	'SearchController@quickSearchClient',
				'as'	=>	'quicksearchclient'
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
Route::post('/ajax/brief/post/create/newclient/save', [
	'uses'	=>	'BriefAddEditController@postNewClient'
]);
Route::get('/ajax/brief/post/create/get/clients', [
	'uses'	=>	'BriefAddEditController@getClients'
]);
			
//Route::get('main', 'MainPagesController@main');

//Route::get('home', 'MainPagesController@main');

//Route::get('index', 'MainPagesController@main');

//Auth::routes();

//Route::get('/home', 'HomeController@index');

