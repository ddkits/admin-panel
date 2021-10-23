<?php

namespace Ddkits\Adminpanel\Http\Middleware;

use Closure;
use Auth;
use Ddkits\Adminpanel\Models\Ipban;

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
        $checkRoleStatus = Auth::user()->role;
        if ($checkRoleStatus != 0 or $checkRoleStatus != 10) {
            return response()->json(['error' => 'Not authorized.'],403);;
        }

        return $next($request);
    }
}
