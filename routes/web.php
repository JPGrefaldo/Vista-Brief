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

Route::get('/', function () {
    //return view('welcome');
    return view('signin');
});

Route::get('forgotpassword', function () {
    //return view('welcome');
    return view('forgotpassword');
});

Route::get('dashboard', function () {
	return view('dashboard');
});

Route::get('main', 'MainPagesController@main');

Route::get('home', 'MainPagesController@main');

Route::get('index', 'MainPagesController@main');
Auth::routes();

Route::get('/home', 'HomeController@index');
