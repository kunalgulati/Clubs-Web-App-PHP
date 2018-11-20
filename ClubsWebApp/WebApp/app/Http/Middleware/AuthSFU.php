<?php

namespace App\Http\Middleware;

use Closure;
use \App\Http\User;
use \GuzzleHttp\Client;

class AuthSFU
{
    private static $sfu_validate_url = 'https://cas.sfu.ca/cas/serviceValidate';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->has('auth_ticket')){
            $ticket = $request->session()->get('auth_ticket', "");
            if(self::validateAuthTicket($ticket)){
                $uname = $request->session()->get('uname');
                $auth_type = $request->session()-get('auth_type');
                //TODO(Ugur): Check if user logged in before, if not register user to db.

                echo $uname . ' ' . $auth_type;
                return $next($request);
            }
        }

        return route('login');
    }

    private static function validateAuthTicket($request, $ticket){
        $service = route('service');
        $query_data = \compact('ticket','service');

        $client = new GuzzleHttp\Client(['base_url' => self::$sfu_validate_url]);
        $response = $client->request('GET', '/', ['query'=>$query_data]);
        $xmlStr = (string) $response->getBody()->getContents();

        $xmlReader = new \DOMDocument();
        $xmlReader->loadXML($xmlStr);
        $xpath = new \DomXpath($xmlReader);
        $uname = $xpath->query('//cas:serviceResponse/cas:authenticationSuccess/cas:user')[0]->nodeValue;
        $auth_type = $xpath->query('//cas:serviceResponse/cas:authenticationSuccess/cas:authtype')[0]->nodeValue;
        $request->session()->put('uname', $uname);
        $request->session()->put('auth_type', $auth_type);
        
        return ture;
    }
}
