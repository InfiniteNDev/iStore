<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Redirect;

class LoginAsAdmin
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
        // if at backend, only login and admin user could use backend
        if (auth()->check() && auth()->user()->type == 'admin' ) {
            return $next($request);
        } else {
            return Redirect::to('admin/login');
        }
    }
}
