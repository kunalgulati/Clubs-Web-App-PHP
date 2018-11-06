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
Route::get('login', function () {
    $service_url = "http://localhost:80";
    $redirect_url = "https://cas.sfu.ca/cas/login?service=".urlencode($service_url);
    Log::debug($redirect_url);
    return redirect($redirect_url);
});
//Process the Login Form
Route::post('login', array('uses' => 'LoginController@doLogin'));
