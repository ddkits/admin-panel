<?php

namespace Ddkits\Adminpanel\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        // check Admin Role in users 0 or 10
        if (Auth::user()->role == 0 or Auth::user()->role == 10) {
            return $next($request);
        }else{
            return response()->json(['error' => 'Not authorized.' . Auth::user()->role],403);;
        }
    }
}
