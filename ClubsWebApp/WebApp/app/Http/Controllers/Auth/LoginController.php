<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    //Sfu redirection links 
    //TODO:(Ugur)Abstractify login urls for other schools
    private static $sfu_cas_url = 'https://cas.sfu.ca/cas';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /* Redirects the user to sfu cas login page
     * NOTE: Unsafe
     */
    public function redirectToSfuLogin(Request $request){
        $service = htmlentities(Route('service'));
        $renew = 'true';
        $query_data = \compact('service','renew');
        $url = self::$sfu_cas_url . '/login?';
        foreach($query_data as $qk => $qv){
            $url .= "$qk=$qv&";
        }
        return redirect($url);
    }

    public function welcome(){
        echo '<h1> Hello World! </h1>';
    }

    public function logout(){
        if(Auth::guest()){
            return \redirect(Route('home'));
        }
        Auth::logout();
        $url = self::$sfu_cas_url . '/logout?';
        return \redirect($url);
    }

    public function registerTicket(Request $request){
        $ticket = $request->query('ticket', null);
        if(!$ticket){
            throw new Exception('Ticket not found');
        }

        $request->session()->put('auth_ticket', $ticket);
        
        $redirectTo = 'login/welcome'; 
        if($request->has('redirectTo')){
            $redirectTo = $request['redirectTo'];
        }
        // $message = $redirectTo;
        // return view('debug.hello', compact('message'));

        return redirect($redirectTo);
    }

}
