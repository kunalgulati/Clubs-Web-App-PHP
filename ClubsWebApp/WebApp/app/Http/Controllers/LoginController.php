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
    private static $sfu_validate_url = 'https://cas.sfu.ca/cas/serviceValidate';

    //NOTE: Unsafe
    public function redirectToSfu(Request $request){
        $redirect = htmlentities(url()->previous());
        $service = htmlentities(Route('validate'));
        $sfu_url = self::makeUrl(self::$sfu_login_url, \compact('redirect','service'));

        return redirect($sfu_url);
    }

    //NOTE: Unsafe
    public function sfuRedirected(Request $request){
        $ticket = $request->get('ticket');
        $redirect = htmlentities($request->get('redirect', Route('home')));
        $service = htmlentities(Route('validate'));
        $format = 'JSON';

        $validate_url = self::makeUrl(self::$sfu_validate_url, \compact('ticket','service','format'));

        $client = new Client();
        $response = $client->request('GET', $validate_url);
        $xmlStr = (string) $response->getBody()->getContents();

        $xmlReader = new \DOMDocument();
        $xmlReader->loadXML($xmlStr);
        $xpath = new \DomXpath($xmlReader);
        $uname = $xpath->query('//cas:serviceResponse/cas:authenticationSuccess/cas:user')[0]->nodeValue;
        $utype = $xpath->query('//cas:serviceResponse/cas:authenticationSuccess/cas:authtype')[0]->nodeValue;
        //echo $xmlReader->saveXML();
        
        echo $utype;
        //return redirect($validate_url);

    }

    public function readUser(Request $request){
        //print_r($request);
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );
            // attempt to do the login
            // if (Auth::attempt($userdata)) {
            if ($userdata['email']=='email@email.com' && $userdata['password']=='password20'  ) {

                // validation successful!
                // redirect them to the secure section or whatever
                return Redirect::to('clubs');
            } else {        

                // validation not successful, send back to form 
                return Redirect::to('login');

            }

        }
    }

    private static function makeUrl($base, $queryData){
        $queryString = "?";
        foreach ($queryData as $key => $value) {
            $queryString .= "$key=$value&";
        }
        $queryString = $queryString;
        return $base . $queryString;
    }
}
