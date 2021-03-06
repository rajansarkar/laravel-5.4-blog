<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

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
        if(Auth::check() && Auth::user()->role == '2'){
        return $next($request);
    }
        else{
            Session::put('errorMsg', 'Access denies. You cannot access this section!');
            return redirect('/handle-error');
        }
    }
}
