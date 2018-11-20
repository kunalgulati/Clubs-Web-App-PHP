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


/*
 * Login Routes:
 *      - 'login' -> Redirects to cas.sfu.ca
 *      - 'login/registerTicket' -> Registers ticket to cas.sfu.ca
 *      - 'logout' -> Logs user out of cas (TODO:Change to appLogout)
 */
Route::get('login', 'Auth\LoginController@redirectToSfuLogin')->name('login');
Route::get('login/registerTicket', 'Auth\LoginController@registerTicket')->name('service');
Route::get('logout', 'Auth\LoginController@logout');

// Dummy route to test sfu authentication
Route::get('login/welcome', 'LoginController@welcome')->middleware('auth');

