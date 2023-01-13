<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UserMiddleware
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
        //is user diambil dari model User
        if (Auth::check() && Auth::user()->isUser()) {
            return $next($request);
        }

        //jika tidak
        return abort(403);
    }
}
