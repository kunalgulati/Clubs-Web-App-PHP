<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class LoginController extends Controller
{

    private static $sfu_login_url = 'https://cas.sfu.ca/cas/login';
    private static $sfu_logout_url = 'https://cas.sfu.ca/cas/logout';

    public function __construct(){
        $this->middleware('guest');
    }

    //NOTE: Unsafe
    public function redirectToSfu(Request $request){
            $service = htmlentities(Route('service'));
            $renew = 'true';
            $query_data = \compact('service','renew');
            $url = self::$sfu_login_url . '?';
            foreach($query_data as $qk => $qv){
                $url .= "$qk=$qv&";
            }
            return \redirect($url);
    }

    public function welcome(){
        echo '<h1> Hello World! </h1>';
    }

    public function logout(){
        return \redirect(self::$sfu_logout_url);
    }

    public function registerTicket(Request $request){
        $ticket = $request->query('ticket', null);
        if(!$ticket){
            throw new Exception('Ticket not found');
        }

        $request->session()->put('auth_ticket', $ticket);
        return redirect('login/welcome');
    }


}
