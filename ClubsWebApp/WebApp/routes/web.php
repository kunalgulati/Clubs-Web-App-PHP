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

// Routes to Clubs Registeration form
Route::get('regitser_club', array('uses' => 'ClubsRegistrationController@showRegistration'));

// route to process the form
Route::post('register_club', array('uses' => 'ClubsRegistrationController@doRegistration'));