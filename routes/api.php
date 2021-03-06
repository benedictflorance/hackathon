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
Route::post('newuser','api\UserController@newUser');

// Doctor Details
Route::post('doctors/getall','api\DoctorController@getAll');
Route::post('doctors/getbyid/{id}','api\DoctorController@getById'); //id here means registerid of the doctor
Route::post('/sendotp','api\OTPController@sendOTP');
Route::post('/verifyotp','api\OTPController@verifyOTP');

Route::group(['middleware'=>'checkToken', 'namespace'=>'api'],function(){
	// Authentication Routes
	Route::post('logout','LoginController@logout');

	// User Forms
	Route::post('newtrusted','UserController@newTrusted');

	//User Details
	Route::post('profile','UserController@getProfile');
	Route::post('doctors/gettrusted','UserController@getTrusted');
	Route::post('checkups/getall','UserController@getHistory');
	Route::post('checkups/id/{id}','UserController@getCheckupById'); //id here means the primary key id of the checkup
});

