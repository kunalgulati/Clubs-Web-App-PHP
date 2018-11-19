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
Route::get('/blackboard', function () {
    return view('blackboard');
});

Route::post('/saveJSON', 'Club_posterController@savePoster');
Route::get('/display_blackboard', 'Club_posterController@loadPoster');



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

// Register An Event
Route::get('register_event', array('uses' => 'ClubsEventsController@showRegistration'));
Route::post('register_event', array('uses' => 'ClubsEventsController@doRegistration'));

//Show All Events 
Route::get('display_events', array('uses' => 'ClubsEventsController@showAllEvents'));

//Edit Events
Route::get('edit_events', array('uses' => 'ClubsEventsController@showAllEditableEvents'));

//Delete Events
Route::get('delete_event/{id}', array('uses' => 'ClubsEventsController@deleteEvent'));

