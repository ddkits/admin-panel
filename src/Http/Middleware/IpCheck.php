<?php

namespace Ddkits\Adminpanel\Http\Middleware;

use Closure;
use Ddkits\Adminpanel\Models\Ipban;

class IpCheck
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
        // check IP if banned or not
        $errorMsg = '<div id="page-wrap">

            <div class="title p-5 m-5" style="font-weight:bold;color: red;height:400px;text-align:center;"><h1>ApiDocPro Security Alert</h1>We are sorry, This IP Address been blocked by our security, please <a href="/#contact-us"> contact us </a> if you have any question.</div>
            </div>';
        $checkIpStatus = Ipban::addIp($request->ip());
        if ($checkIpStatus) {
            return $errorMsg;
        }

        return $next($request);
    }
}
