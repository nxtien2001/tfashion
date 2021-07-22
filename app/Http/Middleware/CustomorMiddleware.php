<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomorMiddleware
{
    private $cus;
    public function __construct()
    {
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'cus')
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect()->route('home')->with('message', 'Bạn cần đăng nhập');
    }
}
