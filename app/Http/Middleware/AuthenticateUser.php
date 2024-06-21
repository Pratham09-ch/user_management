<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, $guard='user')
    // {
    //     if(Auth::guard($guard)->check()){
    //         dd($guard);
    //         return redirect()->route('user.show_profile');
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        // dd(Auth::user());
        if (Auth::user() && Auth::user()->role==0) {
            return $next($request);
        }

        return redirect()->route('login'); // Or any route for unauthenticated users
    }
}
