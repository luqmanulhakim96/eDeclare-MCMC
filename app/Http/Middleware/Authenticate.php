<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
use Closure;
// use App\Http\Controllers\Auth\Request;

class Authenticate extends Middleware
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
         if (Auth::guard($guard)->guest()) {
             if ($request->ajax() || $request->wantsJson()) {
                 return response('Unauthorized.', 401);
             }
             return redirect()->guest('login');
         } else if (Auth::guard($guard)->user()->should_re_login) {

             Auth::guard($guard)->logout();

             if ($request->ajax() || $request->wantsJson()) {
                 return response('Unauthorized.', 401);
             }
             return redirect()->guest('login');
         }

         return $next($request);
     }

   /**
    * Get the path the user should be redirected to when they are not authenticated.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return string|null
    */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
