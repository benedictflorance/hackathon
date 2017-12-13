<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API Events
Route::post('login', 'api\LoginController@login');

Route::group(['middleware'=>'checkToken', 'namespace'=>'api'],function(){
	// Authentication Routes
	Route::post('logout','LoginController@logout');

	// User Forms
	Route::post('newuser','UserController@newUser');
	Route::post('newtrusted','UserController@newTrusted');

	//User Details
	Route::post('doctors/gettrusted','UserController@getTrusted');
	Route::post('checkups/getall','UserController@getHistory');
	Route::post('checkups/getbytime','UserController@getCheckupTimeStamped');

	// Doctor Details
	Route::post('doctors/getall','DoctorController@getAll');

});

