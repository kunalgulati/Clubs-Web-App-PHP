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

// Register_Club
Route::get('register_club', array('uses' => 'Club\RegistrationController@showRegistration'));
Route::post('register_club', array('uses' => 'Club\RegistrationController@doRegistration'));

//                      *********************    EXPENSE     *********************                      ///
// Register_Expenses
Route::get('register_expenses', array('uses' => 'Club\ExpensesController@showRegistration'));
Route::post('register_expenses', array('uses' => 'Club\ExpensesController@doRegistration'));
//Display Register Expenses
Route::get('display_expenses', array('uses' => 'Club\ExpensesController@showExpenses'));
//Delete Expense
Route::get('delete_expense/{id}', array('uses' => 'Club\ExpensesController@deleteExpense'));

//                      *********************    EVENTS     *********************                      ///
// Register An Event
Route::get('register_event', array('uses' => 'Club\EventsController@showRegistration'));
Route::post('register_event', array('uses' => 'Club\EventsController@doRegistration'));
//Show All Events 
Route::get('display_events', array('uses' => 'Club\EventsController@showAllEvents'));
//Delete Events
Route::get('delete_event/{id}', array('uses' => 'Club\EventsController@deleteEvent'));

//                      *********************    CLUB DASHBOARD     *********************                      ///
//Display Club Dashboard
Route::get('display_dashboard', array('uses' => 'Club\DashboardController@showDashboard'));
//Create a Dashboard POST
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
