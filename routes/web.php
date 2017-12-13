<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// API Events
Route::post('login', 'api\LoginController@login');
Route::group(['middleware'=>'CheckToken','prefix'=>'api'],function(){
	// Authentication Routes
	Route::post('logout','api\LoginController@logout');

	// User Forms
	Route::post('newuser','api\UserController@newUser');
	Route::post('newtrusted','api\UserController@newTrusted');

	//User Details
	Route::post('doctors/gettrusted','api\UserController@getTrusted');
	Route::post('checkups/getall','api\UserController@getHistory');
	Route::post('checkups/getbytime','api\UserController@getCheckupTimeStamped');

	// Doctor Details
	Route::post('doctors/getall','api\DoctorController@getAll');

});

