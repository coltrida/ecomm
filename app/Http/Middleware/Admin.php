<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use function redirect;
use function route;

class Admin
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
        if(Auth::check() && Auth::user()->isAdmin()){
            return $next($request);
        }
        return redirect('home');
    }
}
