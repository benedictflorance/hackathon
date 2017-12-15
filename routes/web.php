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
Route::get('/','LoginController@showMailForm');
Route::get('/register', 'LoginController@showRegisterForm');
Route::get('/login','LoginController@showLoginForm');

Route::post('/', 'MailController@sendMail');
Route::post('/register', 'LoginController@storeDoctorDetails');
Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');

