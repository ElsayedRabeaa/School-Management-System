<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AssignGuard
{

    public function handle($request, Closure $next, $guard=null , $redirectTo="/")
    {
        if(!Auth::guard($guard)->check()){
            return redirect($redirectTo);
        }
        Auth::shouldUse($guard);
        return $next($request);
    }
    
}
