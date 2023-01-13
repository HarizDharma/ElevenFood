<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminMiddleware
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
        //is admin diambil dari model User
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        //jika tidak
        return abort(403);
    }
}
