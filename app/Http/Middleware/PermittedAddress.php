<?php

namespace Falcon\Http\Middleware;

use Closure;

class PermittedAddress
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
        if (!in_array($request->getClientIp(), explode(',', env('PERMITTED_IP_ADDRESSES', '')))) {
            return response()->view('welcome');
        }

        return $next($request);
    }
}
