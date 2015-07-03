<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class NotLogin
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
    if (auth()->check()) {
      // if login, goto index
      if ($request->is('admin*'))
      {
        if (auth()->user()->type == 'admin') {
          // if at backend, login with admin, redirect to index
          return Redirect::to('admin');
        } else {
          // if at backend, login not with admin, goto login
          return $next($request);
        }
      } else {
        // if at frontend, redirect to index
        return Redirect::to('/');
      }
    } else {
      // if not login, goon
      return $next($request);
    }
  }
}
