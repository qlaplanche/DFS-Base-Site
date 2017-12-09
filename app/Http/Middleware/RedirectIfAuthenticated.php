<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            session(['alert-class' => 'warning']);
            session(['alert-msg' => 'Je suis perdu']);
            session(['alert-btn' => 'Plus Perdu']);
            return redirect('/home');
        }

        return $next($request);
    }
}
