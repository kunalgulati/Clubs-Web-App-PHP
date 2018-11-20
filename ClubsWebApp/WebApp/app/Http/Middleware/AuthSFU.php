<?php

namespace App\Http\Middleware;

use Closure;
use \App\Http\User;

class AuthSFU
{
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
            if(validateAuthTicket($ticket)){
                $uname = $request->session()->get('uname');
                $auth_type = $request->session()-get('auth_type');
                return $next($request);
            }
        }

        return \redirect('login');
    }
}
