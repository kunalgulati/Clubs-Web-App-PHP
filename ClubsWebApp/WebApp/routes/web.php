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
//Process the Login Form
Route::post('login', array('uses' => 'LoginController@doLogin'));

// Register_Club
Route::get('register_club', array('uses' => 'ClubsRegistrationController@showRegistration'));
Route::post('register_club', array('uses' => 'ClubsRegistrationController@doRegistration'));

//                      *********************    EXPENSE     *********************                      ///
// Register_Expenses
Route::get('register_expenses', array('uses' => 'ClubsExpensesController@showRegistration'));
Route::post('register_expenses', array('uses' => 'ClubsExpensesController@doRegistration'));
//Display Register Expenses
Route::get('display_expenses', array('uses' => 'ClubsExpensesController@showExpenses'));
//Delete Expense
Route::get('delete_expense/{id}', array('uses' => 'ClubsExpensesController@deleteExpense'));

//                      *********************    EVENTS     *********************                      ///
// Register An Event
Route::get('register_event', array('uses' => 'ClubsEventsController@showRegistration'));
Route::post('register_event', array('uses' => 'ClubsEventsController@doRegistration'));
//Show All Events 
Route::get('display_events', array('uses' => 'ClubsEventsController@showAllEvents'));
//Edit Events
Route::get('edit_events', array('uses' => 'ClubsEventsController@showAllEditableEvents'));
//Delete Events
Route::get('delete_event/{id}', array('uses' => 'ClubsEventsController@deleteEvent'));

//                      *********************    CLUB DASHBOARD     *********************                      ///
//Display Club Dashboard
Route::get('display_dashboard', array('uses' => 'ClubsDashboardController@showDashboard'));
//Create a Dashboard POST
Route::get('register_post', array('uses' => 'ClubsDashboardController@showRegistration'));
Route::post('register_post', array('uses' => 'ClubsDashboardController@doRegistration'));

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
