<?php

namespace App\Http\Middleware;

use Closure;

class Spoc
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
       if (Auth::check() && Auth::user()->role == 'Spoc') {
        return $next($request);
    }
    elseif (Auth::check() && Auth::user()->role == 'admin') {
        return redirect('/customer');
    }
    else {
        return redirect('/admin');
    }
    }
}
