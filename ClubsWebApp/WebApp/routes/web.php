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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bootstrap_palette', function () {
    return view('bootstrap_palette');
});

Route::get('/clubs', function () {
    return view('clubs');
});

//Get the Login Page
Route::get('login', 'loginController@loginRedirectSfu');
//Process the Login Form
Route::post('login', array('uses' => 'LoginController@doLogin'));
