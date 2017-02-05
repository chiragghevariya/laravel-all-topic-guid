<?php

namespace App\Http\Middleware;

use Closure;

class simpleUserMiddleware
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
        if(\Auth::user()->role == 'simpleUser')
            return $next($request);

        else
            return redirect('/register');
    }
}
