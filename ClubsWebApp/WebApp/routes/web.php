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

Route::post('/saveJSON', 'Club\PosterController@savePoster');
Route::post('/display_blackboard', 'Club\PosterController@loadPoster');



Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/search','SearchController@index');
Route::get('/clubCreate',function(){
    return view('clubCreate');
});
Route::get('/bootstrap_palette', function () {
    return view('bootstrap_palette');
});

Route::get('/displayclubs','DisplayController@displayClub');
Route::get('/displaymembers','DisplayController@displayMember');

/*
 * Club Routes:
 *      - Display
 *      - Search
 *      - Registration
 */
Route::get('clubs', 'Club\RegistrationController@showClubs');
Route::get('register_club', array('uses' => 'Club\RegistrationController@showRegistration'));
Route::post('register_club', array('uses' => 'Club\RegistrationController@doRegistration'));

//                      *********************    EXPENSE     *********************                      ///
Route::get('register_expenses', array('uses' => 'Club\ExpensesController@showRegistration'));
Route::post('register_expenses', array('uses' => 'Club\ExpensesController@doRegistration'));
Route::get('display_expenses', array('uses' => 'Club\ExpensesController@showExpenses'));
Route::get('delete_expense/{id}', array('uses' => 'Club\ExpensesController@deleteExpense'));

//                      *********************    EVENTS     *********************                      ///
Route::get('register_event', array('uses' => 'Club\EventsController@showRegistration'));
Route::post('register_event', array('uses' => 'Club\EventsController@doRegistration'));
Route::get('display_events', array('uses' => 'Club\EventsController@showAllEvents'));
Route::get('delete_event/{id}', array('uses' => 'Club\EventsController@deleteEvent'));

//                      *********************    CLUB DASHBOARD     *********************                      ///
Route::get('display_dashboard', array('uses' => 'Club\DashboardController@showDashboard'));
Route::get('register_post', array('uses' => 'Club\DashboardController@showRegistration'));
Route::post('register_post', array('uses' => 'Club\DashboardController@doRegistration'));

/*
 * Login Routes:
 *      - 'login' -> Redirects to cas.sfu.ca
 *      - 'login/registerTicket' -> Registers ticket from cas.sfu.ca
 *      - 'logout' -> Logs user out of cas (TODO:Change to appLogout)
 */
Route::get('login', 'Auth\LoginController@redirectToSfuLogin')->name('login');
Route::get('login/registerTicket', 'Auth\LoginController@registerTicket')->name('service');
Route::get('logout', 'Auth\LoginController@logout');

// Dummy route to test sfu authentication
Route::get('/login/welcome', 'Auth\LoginController@welcome')->middleware('auth');


/*
 * Profile Routes:
 *      - 'create' -> Initiates profile creation' TODO:(UGUR) Implement
 */
Route::get('/user/createProfile', 'Auth\RegisterController@createProfile')
        ->name('create_profile');
