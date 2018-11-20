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
})->name('home');

Route::get('/bootstrap_palette', function () {
    return view('bootstrap_palette');
});

Route::get('/clubs', function () {
    return view('clubs');
});

Route::get('login', 'LoginController@redirectToSfu');

//Redirect to CAS to authenticate sfu user
Route::get('login/welcome', 'LoginController@welcome')->middleware('auth_sfu');

//Validate sfu Token
Route::get('validateUserTicket', 'LoginController@sfuRedirected')
            ->name('validate');

//Process user info after sfu redirects back
Route::get('read_user', 'LoginController@readUser')
        ->name('readUser');

//Process the Login Form
Route::post('login', array('uses' => 'LoginController@doLogin'));