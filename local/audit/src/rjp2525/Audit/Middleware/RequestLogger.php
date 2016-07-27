<?php

namespace rjp2525\Audit\Middleware;

use Auth;
use Closure;
use rjp2525\Audit\Models\Request;

class RequestLogger
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
        // Log request
        $data = new Request();
        $data->ip = $request->getClientIp();
        $data->path = $request->path();
        $data->method = $request->getMethod();

        $get = $request->query->all();
        if (count($get) > 0) {
            $data->get = var_export($get, true);
        }

        $post = $request->request->all();
        if (count($post) > 0) {
            if ($post->has('password') || $post->has('password_confirmation')) {
                $post['password'] = null;
            }

            $data->post = var_export($post, true);
        }

        $cookies = $request->cookies->all();
        if (count($cookies) > 0) {
            $data->cookies = var_export($cookies, true);
        }

        if (Auth::check()) {
            $data->user_id = Auth::id();
        }

        $data->agent = $request->server('HTTP_USER_AGENT');
        $data->session = $request->session()->getId();
        $data->save();

        return $next($request);
    }
}
