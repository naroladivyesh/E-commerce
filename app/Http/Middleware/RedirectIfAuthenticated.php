<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\AdminController;


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
            return redirect(RouteServiceProvider::HOME);
        }
            // //return redirect()->action('AdminController@login')->with('message_login','Please login via valid email and Password');
            // //return redirect('/admin')->with('message_login','Please login via valid email and Password');
            // return redirect('/admin')->with('message_error','Invalid User and Password');
        

        return $next($request);
    }
}
