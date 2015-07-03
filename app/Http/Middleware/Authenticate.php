<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Http\Request;

class Authenticate
{
  /**
   * The Guard implementation.
   *
   * @var Guard
   */
  protected $auth;

  /**
   * Create a new filter instance.
   *
   * @param  Guard  $auth
   * @return void
   */
  public function __construct(Guard $auth)
  {
    $this->auth = $auth;
  }

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if ($this->auth->guest()) {
      if ($request->ajax()) {
        return response('Unauthorized.', 401);
      } else {
        if ($request->is('admin*'))
        {
          // if at frontend, redirect to login
          return redirect()->guest('admin/login');
        } else {
          // if at backend, redirect to admin/login
          return redirect()->guest('login');
        }
      }
    }

    return $next($request);
  }
}
