<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        switch ($guard){

            case 'superadmin':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('adashboard.index');
                }
                break;

            case 'travel':
                if (Auth::guard($guard)->check()){
                    return redirect()->route('tdashboard.index');
                }
                break;

            default:
                if (Auth::guard($guard)->check()){
                    return 'belom dibuat bro';
                }
                break;
        }
        return $next($request);
    }
}
