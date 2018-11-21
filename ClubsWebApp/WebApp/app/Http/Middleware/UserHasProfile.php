<?php

namespace App\Http\Middleware;

use Closure;

class UserHasProfile
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
        if(!Auth::guest()){
            if(!$user->profile()){
                return redirect('create_profile');
            }
        }
        return $next($request);
    }
}
