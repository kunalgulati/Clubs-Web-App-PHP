<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\User;
use Illuminate\Support\Facades\Auth;
use Closure;
use GuzzleHttp\Client;

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
        if(!Auth::guest()){
            return $next($request);
        }

        if($request->session()->has('auth_ticket')){
            $ticket = $request->session()->get('auth_ticket');
            if(self::validateAuthTicket($request, $ticket)){
                $uname = $request->session()->get('uname','');
                $auth_type = $request->session()->get('auth_type','');
                $user = User::where('uname',$uname)->first();
                if(!$user){
                    $user = User::create(\compact('uname','auth_type'));
                }                 
                Auth::login($user);
                return $next($request);
            }
        }

        return redirect(Route('login'));
    }

    private static function validateAuthTicket($request, $ticket){
        $service = htmlentities(Route('service'));
        $query_data = \compact('ticket','service');
        $url = self::$sfu_validate_url . '?';
        foreach($query_data as $qk => $qv){
            $url .= "$qk=$qv&";
        }

        //$guzzleDebugPath = realpath(__DIR__.'/../../../storage/logs/guzzle.txt');
        $client = new Client(['allow_redirects' => false]);
        $response = $client->request('GET', $url); //['debug' => fopen($guzzleDebugPath, 'w+')]);
        $xmlStr = (string) $response->getBody()->getContents();

        try{
            $xmlReader = new \DOMDocument();
            $xmlReader->loadXML($xmlStr);
            $xpath = new \DomXpath($xmlReader);
            $uname = $xpath->query('//cas:serviceResponse/cas:authenticationSuccess/cas:user')[0]->nodeValue;
            $auth_type = $xpath->query('//cas:serviceResponse/cas:authenticationSuccess/cas:authtype')[0]->nodeValue;
            $request->session()->put('uname', $uname);
            $request->session()->put('auth_type', $auth_type);    
        }
        catch(\Exception $e){
            echo $xmlStr;
            $request->session()->put('validation_error', $e->getMessage());
            return false;
        }
                
        return true;
    }
}
