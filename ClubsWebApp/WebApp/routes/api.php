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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes to Clubs Registeration form
Route::get('regitser_club', array('uses' => 'ClubsRegistrationController@showRegistration'));

// route to process the form
Route::post('register_club', array('uses' => 'ClubsRegistrationController@doRegistration'));
