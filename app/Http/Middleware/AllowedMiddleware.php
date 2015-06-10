<?php

namespace Falcon\Http\Middleware;

use Closure;

class AllowedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!$request->user()->allowed($permission)) {
            abort(404);
        }

        return $next($request);
    }
}
