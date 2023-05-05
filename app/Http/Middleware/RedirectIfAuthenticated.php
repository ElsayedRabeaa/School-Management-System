<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class RedirectIfAuthenticated
{

    public function handle(Request $request, Closure $next ,$guard=null, $redirectTo='/dashboard')
    {
   if(Auth::guard($guard)->check()){
    return redirect($redirectTo);
   }
       return $next($request);
    }
}