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

Route::get('/search','SearchController@index');
Route::get('/clubCreate',function(){
    return view('clubCreate');
});
Route::get('/bootstrap_palette', function () {
    return view('bootstrap_palette');
});

Route::get('/displayclubs','DisplayController@displayClub');
Route::get('/displaymembers','DisplayController@displayMember');
Route::get('/clubs', function () {
    return view('clubs');
});

//Get the Login Page
Route::get('login', function () {
    return view('login');
});
//Process the Login Form
Route::post('login', array('uses' => 'LoginController@doLogin'));

// Register_Club
Route::get('register_club', array('uses' => 'ClubsRegistrationController@showRegistration'));
Route::post('register_club', array('uses' => 'ClubsRegistrationController@doRegistration'));

/*
//Direct to a member page
Route::get('/member', 'ClubPageController@memberPage');

//Direct to a non-member page
Route::get('/nonmember', 'ClubPageController@nonMemberPage');

//Direct to an admin page
Route::get('/admin', 'ClubPageController@adminPage');
*/

//takes input from the club url and directs it to the club main page
Route::get('/{name}', 'ClubPageController@clubPage');


