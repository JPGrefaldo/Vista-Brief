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

Route::get('/test1', function() {
	echo '<p>-'.date('h:i:s M. d, Y').'-</p>';
});

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
	Route::get('/job_sheet', [
		'uses'	=>	'BriefController@index',
		'as'	=>	'briefsheets'
	]);
	Route::get('/job_sheet/post/create', [
		'uses'	=>	'BriefAddEditController@new',
		'as'	=>	'newbriefsheet'
	]);
	Route::post('/job_sheet/post/save', [
		'uses'	=>	'BriefAddEditController@postNewBrief',
		'as'	=>	'postnewbrief'
	]);
	Route::get('/job_sheet/draft/{id}', [
		'uses'	=>	'BriefAddEditController@formEditBrief',
		'as'	=>	'formeditbrief'
	]);
	Route::post('/job_sheet/draft/save', [
		'uses'	=>	'BriefAddEditController@postEditBrief',
		'as'	=>	'posteditbrief'
	]);
	Route::get('/job_sheet/{id}', [
		'uses'	=>	'BriefController@submitted',
		'as'	=>	'submittedbriefsheet'
	]);
	Route::post('/job_sheet/amend/save', [
		'uses'	=>	'BriefController@postNewAmend',
		'as'	=>	'postnewamend'
	]);
	Route::get('/job_sheet/find/criteria', [
		'uses'	=>	'SearchController@quickSearchBrief',
		'as'	=>	'quicksearchbrief'
	]);
	Route::get('/job_sheet/advancesearch/criteria', [
		'uses'	=>	'SearchController@advanceSearchBrief',
		'as'	=>	'advancesearchbrief'
	]);
	/* / Brief Routes */

	/* Planning Requests */
	Route::get('/planning_request', [
		'uses'	=>	'PlanningController@index',
		'as'	=>	'planningrequests'
	]);
	Route::get('/planning_request/post/create', [
		'uses'	=>	'PlanningController@new',
		'as'	=>	'newplanningrequest'
	]);
	Route::post('/planning_request/post/save', [
		'uses'	=>	'PlanningController@postNewPlanning',
		'as'	=>	'postnewplanning'
	]);
	Route::get('/planning_request/{id}', [
		'uses'	=>	'PlanningController@submitted',
		'as'	=>	'submittedplanningrequest'
	]);
	Route::get('/planning_request/find/criteria', [
		'uses'	=>	'SearchController@quickSearchPlanning',
		'as'	=>	'quicksearchplanning'
	]);
	/* / Planning Requests */

	/* PDF Generator: Test Controller */
	Route::get('/pdf/file/{id}', [
		'uses'	=> 'PdfController@get_pdfSubmittedBriefAttachment',
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
			Route::get('/user/delete/{id}', [
				'uses'	=>	'AdminController@deleteUser',
				'as'	=>	'deleteuser'
			]);
			Route::get('/users/find/criteria', [
				'uses'	=>	'SearchController@quickSearchUser',
				'as'	=>	'quicksearchuser'
			]);
			
			/* Department Ruoting */
			Route::get('/departments', [
				'uses'	=>	'DepartmentController@index',
				'as'	=>	'departments'
			]);
			Route::get('/departments/new', [
				'uses'	=>	'DepartmentController@formNewDepartment',
				'as'	=>	'formnewdepartment'
			]);
			Route::post('/departments/store', [
				'uses'	=>	'DepartmentController@postNewDepartment',
				'as'	=>	'postnewdepartment'
			]);
			Route::get('/departments/edit/{id}', [
				'uses'	=>	'DepartmentController@formEditDepartment',
				'as'	=>	'formeditdepartment'
			]);
			Route::post('/departments/update', [
				'uses'	=>	'DepartmentController@postEditDepartment',
				'as'	=>	'posteditdepartment'
			]);

			/* Clients */
			Route::get('/clients', [
				'uses'	=>	'ClientController@index',
				'as'	=>	'clients'
			]);
			/*Route::get('/clients/new', [	
				'uses'	=>	'ClientController@formNewClient',
				'as'	=>	'formnewclient'
			]);*/
			Route::post('/clients/edit', [	
				'uses'	=>	'ClientController@postEditClient',
				'as'	=>	'posteditclient'
			]);
			Route::get('/clients/delete/{id}', [
				'uses'	=>	'ClientController@deleteClient',
				'as'	=>	'deleteclient'
			]);
			Route::get('/clients/find/criteria', [
				'uses'	=>	'SearchController@quickSearchClient',
				'as'	=>	'quicksearchclient'
			]);

			/* Storage */
			Route::get('/storage', [
				'uses'	=>	'StorageController@index',
				'as'	=>	'storage'
			]);
			Route::get('/storage/delete', [
				'uses'	=>	'StorageController@index',
				'as'	=>	'storagedelete'
			]);
		});
	});	/* / Admin Middleware */

	Route::get('/profile', [
		'uses'	=>	'UserController@profile',
		'as'	=>	'profile'
	]);
	Route::post('/profile/update', [
		'uses'	=>	'UserController@postUpdateProfile',
		'as'	=>	'postupdateprofile'
	]);
	Route::post('/profile/changepassword', [
		'uses'	=>	'UserController@postUpdateUserPassword',
		'as'	=>	'postupdateuserpassword'
	]);
	Route::post('/profile/photo/upload', [
		'uses'	=>	'UserController@postAvatarUpload',
		'as'	=>	'postavatarupload'
	]);
	
	Route::get('/settings', [	/* Settings */
		'uses'	=>	'SettingController@index',
		'as'	=>	'settings'
	]);
});


// Route::post('/ajax/departments/new/save', [
// 	'uses'	=>	'DepartmentController@postNewDepartment',
// 	'as'	=>	'postnewdepartment'
// ]);
// Route::post('/ajax/departments/edit/save', [
// 	'uses'	=>	'DepartmentController@postEditDepartment',
// 	'as'	=>	'posteditdepartment'
// ]);
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



// test	
Route::get('/phpinfo', function() {
	return view('phpinfo');
});

